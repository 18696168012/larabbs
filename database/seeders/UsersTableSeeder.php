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
        $user->name = "Gator";
        $user->email = '791264638@qq.com';
        $user->avatar = '/uploads/images/avatars/202108/12/1_1628753237_xYkZMImW35.png';
        $user->save();
        // 初始化用户角色，将 1 号用户指派为『站长』
        $user->assignRole('Founder');

        // 将 2 号用户指派为『管理员』
        $user = User::find(2);
        $user->name = "张宏扬";
        $user->email = '1403899088@qq.com';
        $user->save();
        $user->assignRole('Maintainer');
    }
}
