<?php

namespace App\Actions\Tickets;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ShowTicketAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Consulter";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "eye";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        return redirect()->route('tickets.show', $model);
    }
}
