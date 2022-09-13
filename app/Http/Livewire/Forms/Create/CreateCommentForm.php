<?php

namespace App\Http\Livewire\Forms\Create;

use App\Models\Ticket;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;

class CreateCommentForm extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;

    public $ticket;
    public $comment;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Textarea::make('comment')
                ->required()
                ->label('Commentaire'),
        ];
    }


    public function save()
    {
        $this->form->validate();

        $this->ticket->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->user()->id,
        ]);
        session()->flash('success', 'Message ajouté avec succès');
        return redirect()->route('tickets.show', $this->ticket);
    }
    public function render()
    {
        return view('livewire.forms.create.create-comment-form');
    }
}
