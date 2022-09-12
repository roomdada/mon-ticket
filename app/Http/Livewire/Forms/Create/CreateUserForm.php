<?php

namespace App\Http\Livewire\Forms\Create;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;

class CreateUserForm extends Component implements HasForms
{
  use \Filament\Forms\Concerns\InteractsWithForms;

  public $state = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => '',
    'role_id' => '',
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
          TextInput::make('state.first_name')
            ->required()
            ->label('Nom'),
          TextInput::make('state.last_name')
            ->required()
            ->label('Prénom'),
          TextInput::make('state.email')
            ->required()
            ->label('E-mail'),
          Select::make('state.role_id')
            ->required()
            ->label('Role')
            ->options(Role::all()->pluck('name', 'id')),
          TextInput::make('state.password')
            ->required()
            ->password()
            ->label('Mot de passe'),
          TextInput::make('state.password_confirmation')
            ->required()
            ->password()
            ->label('Confirmation du mot de passe'),
        ])
        ->columns(2),
    ];
  }

  public function save()
  {
    $this->validate([
      'state.first_name' => 'required',
      'state.last_name' => 'required',
      'state.email' => 'required|email|unique:users,email',
      'state.password' => 'required|confirmed',
      'state.role_id' => 'required',
    ]);

    $user = User::create([
      'identifier' => Str::uuid(),
      'first_name' => $this->state['first_name'],
      'last_name' => $this->state['last_name'],
      'email' => $this->state['email'],
      'password' => Hash::make($this->state['password']),
      'role_id' => (int)$this->state['role_id'],
    ]);

    session()->flash('success', 'Utilisateur créé avec succès');
    return redirect()->route('users.index');
    
  }
  public function render()
  {
    return view('livewire.forms.create.create-user-form');
  }
}
