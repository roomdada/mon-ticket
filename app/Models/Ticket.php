<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public const OPENED = 'Ouvert';
    public const CLOSED = 'Fermé';


    protected $guarded = [];

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeClosed($query)
    {
        return $query->where('state', self::CLOSED);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function isOpen() : bool
    {
      return $this->state === self::OPENED;
    }

    public function isClosed() : bool
    {
      return $this->state === self::CLOSED;
    }

    public function closedAt() : Attribute
    {
      return new Attribute(
        fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans()
      );
    }



}
