@if ($searchBy)
  @component('laravel-views::components.form.input-group', [
    'placeholder' => 'RECHERCHER...',
    'model' => 'search',
    'onClick' => 'clearSearch',
    'icon' => $search ? 'x-circle' : 'search',
    ])
  @endcomponent
@endif
