<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create first user as admin
        factory(User::class)->make([
            'login' => 'admin',
            'email' => 'admin@email.com'
        ])->save();
    }
}
