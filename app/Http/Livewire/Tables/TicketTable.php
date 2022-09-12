<?php

namespace App\Http\Livewire\Tables;

use App\Models\Ticket;
use LaravelViews\Views\TableView;

class TicketTable extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Ticket::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
          'Date',
          'Titre',
          'Type de ticket',
          'Etat',
          'Créé par',
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
          $model->created_at->format('d/m/Y'),
          $model->title,
          $model->ticketType->name,
          $model->state,
          $model->user->full_name,
        ];
    }
}
