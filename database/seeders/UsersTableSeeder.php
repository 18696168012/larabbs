<?php

namespace Database\Seeders;

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
        User::factory()->count(10)->create();
        $user=User::find(1);
        $user->name = "张宏扬1";
        $user->email = '791264638@qq.com';
        $user->avatar = '/uploads/images/avatars/202108/12/1_1628753237_xYkZMImW35.png';
        $user->save();
    }
}
