<?php

namespace App\Http\Livewire\Forms\Create;

use Livewire\Component;
use App\Models\TicketType;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;

class CreateTicketForm extends Component implements HasForms
{
  use \Filament\Forms\Concerns\InteractsWithForms;

  public $state = [
    'title' => '',
    'description' => '',
    'image' => '',
    'ticket_type_id' => '',
  ];

  public function mount()
  {
    $this->form->fill();
  }

  protected function getFormSchema(): array
  {
    return [
      Card::make()
        ->schema([
          TextInput::make('state.title')
            ->required()
            ->label('Titre'),
            Select::make('state.ticket_type_id')
            ->required()
            ->label('Type de ticket')
            ->options(TicketType::all()->pluck('name', 'id')),
          RichEditor::make('state.description')
            ->toolbarButtons([
              'attachFiles',
              'blockquote',
              'bold',
              'bulletList',
              'codeBlock',
              'h2',
              'h3',
              'italic',
              'link',
              'orderedList',
              'redo',
              'strike',
              'undo',
            ])
            ->required()
            ->label('Description'),
     

        ])
        ->columns(1),
    ];
  }

  public function save()
  {
    $this->form->validate();

    auth()->user()->tickets()->create($this->state);
    session()->flash('success', 'Ticket créé avec succès');
    return redirect(route('tickets.index'));
  }
  public function render()
  {
    return view('livewire.forms.create.create-ticket-form');
  }
}
