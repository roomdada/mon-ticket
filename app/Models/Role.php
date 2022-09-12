<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const ADMIN = 1;
    public const USER = 2;

    public function users()
    {
      return $this->hasMany(User::class);
    }
}
