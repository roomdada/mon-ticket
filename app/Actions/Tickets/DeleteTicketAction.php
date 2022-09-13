<?php

namespace App\Actions\Tickets;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use LaravelViews\Views\View;

class DeleteTicketAction extends Action
{
  use Confirmable;
  /**
   * Any title you want to be displayed
   * @var String
   * */
  public $title = "Supprimer";

  /**
   * This should be a valid Feather icon string
   * @var String
   */
  public $icon = "trash";

  /**
   * Execute the action when the user clicked on the button
   *
   * @param $model Model object of the list where the user has clicked
   * @param $view Current view where the action was executed from
   */
  public function handle($model, View $view)
  {
    $model->delete();

    return redirect()->route('tickets.index');
  }

  public function getConfirmationMessage()
  {
    return "Êtes-vous sûr de vouloir supprimer ce ticket ?";
  }

  public function renderIf($model, View $view)
  {
    if($model->isOpen() && ! auth()->user()->isAdmin())
    {
      return true;
    }
  }
}
