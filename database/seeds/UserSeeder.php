<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Ninette Durán',
            'username' => 'ninette',
            'email' => 'ninetteduran@email',
            'password' => bcrypt('ninetteduran'),
        ]);
    }
}
