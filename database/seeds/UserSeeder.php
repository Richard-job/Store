<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(User::class, 3)->create(['is_admin' => true]);
        factory(User::class, 1)->create([
                'first_name' => 'richard',
                'last_name' => 'ocaranza',
                'email' => 'ro@example.com',
                'is_admin' => true
            ]);
    }
}
