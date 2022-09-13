<?php

namespace App\Http\Livewire\Tables;

use App\Actions\Tickets\DeleteTicketAction;
use App\Models\Ticket;
use LaravelViews\Views\TableView;
use App\Actions\Tickets\ShowTicketAction;
use Illuminate\Contracts\Database\Eloquent\Builder;

class TicketTable extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Ticket::class;
    public $searchBy = ['title','identifier'];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
          'Date',
          'Identifiant',
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
          $model->identifier,
          $model->title,
          $model->ticketType->name,
          $model->state,
          $model->user->full_name,
        ];
    }

    public function repository() : Builder 
    {
      if(! auth()->user()->isAdmin())
      {
        return Ticket::query()->whereUserId(auth()->id())->latest();
      }
      return Ticket::query()->with('ticketType', 'user')->latest();
    }

    protected function actionsByRow() 
    {
      return [
        new ShowTicketAction,
        new DeleteTicketAction
      ];
    }
}
