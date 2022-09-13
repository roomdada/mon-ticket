<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uuid',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function createdAt() : Attribute
    {
      return new Attribute(
        fn ($value) => \Carbon\Carbon::parse($value)->format('d/m/Y')
      );
    }
}
