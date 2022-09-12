<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    Role::create([
      'id' => Role::ADMIN,
      'name' => 'Admin',
    ]);

    Role::create([
      'id' => Role::USER,
      'name' => 'Client'
    ]);

    User::create([
      'identifier' => 'admin',
      'first_name' => 'Admin',
      'last_name' => 'Général',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('password'),
      'role_id' => Role::ADMIN,
    ]);


    TicketType::create([
      'name' => 'Technique',
      'uuid' => Str::uuid()
    ]);
  }
}
