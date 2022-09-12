<?php

namespace App\Http\Livewire\Tables;

use App\Models\User;
use LaravelViews\Views\TableView;

class UserTable extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
          'Date',
          'Nom complet',
          'E-mail',
          'Role'
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
          $model->created_at,
          $model->full_name,
          $model->email,
          $model->role->name
        ];
    }
}
