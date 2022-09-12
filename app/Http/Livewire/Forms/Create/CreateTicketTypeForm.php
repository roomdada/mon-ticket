<?php

namespace App\Http\Livewire\Forms\Create;

use Livewire\Component;
use App\Models\TicketType;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\Card;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;

class CreateTicketTypeForm extends Component implements HasForms
{
  use \Filament\Forms\Concerns\InteractsWithForms;

  public $name;

  public function mount()
  {
    $this->form->fill();
  }

  protected function getFormSchema(): array
  {
    return [
      Card::make()
        ->schema([
          TextInput::make('name')
            ->required()
            ->label('Libellé'),
        ])
        ->columns(1),
    ];
  }

  public function save()
  {
    $this->validate([
      'name' => ['required', 'string', Rule::unique('ticket_types', 'name')],
    ]);

    TicketType::create([
      'uuid' => \Illuminate\Support\Str::uuid(),
      'name' => $this->name,
    ]);

    session()->flash('success', 'Type de ticket créé avec succès !');
    return redirect()->route('tickets-types.index');
  }

  public function render()
  {
    return view('livewire.forms.create.create-ticket-type-form');
  }
}
