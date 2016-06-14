<?php

use Illuminate\Database\Seeder;
use App\Smile\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            array(
                'username'  => 'admin',
                'email'     => 'admin@domain.com',
                'password'  => 'admin',
                'full_name' => 'Administrator',
                'avatar'    => 'images/img.jpg',
                'group_id'  => 1,
                'status'    => 1,
            ),
            array(
                'username'  => 'demo',
                'email'     => 'demo@domain.com',
                'password'  => 'demo',
                'full_name' => 'Demo',
                'avatar'    => 'images/img.jpg',
                'group_id'  => 0,
                'status'    => 1,
            ),
        ];
        foreach ($users as $user) {
            if (User::where('username', $user['username'])->count() == 0) {
                User::create($user);
            }
        }
    }
}
