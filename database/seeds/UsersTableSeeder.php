<?php

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
        $users = [
            array(
                'username'  => 'admin',
                'email'     => 'admin@domain.com',
                'password'  => 'admin',
                'full_name' => 'Hoang Nham',
                'avatar'    => 'images/img.jpg',
                'group_id'  => 1,
                'status'    => 1,
            ),
            array(
                'username'  => 'demo',
                'email'     => 'admin@domain.com',
                'password'  => 'demo',
                'full_name' => 'Demo',
                'avatar'    => 'images/img.jpg',
                'group_id'  => 0,
                'status'    => 1,
            ),
        ];
        foreach ($users as $user) {
            if (\App\Smile\Users\User::where('username', $user['username'])->count() == 0) {
                App\Smile\Users\User::create($user);
            }
        }
    }
}
