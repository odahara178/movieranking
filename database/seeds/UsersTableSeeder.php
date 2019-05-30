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
        factory(\App\User::class, 5)->create();

        DB::table('users')->insert([
            [
            'name'=>'小田原宏武',
            'email'=>'12345678@gmail.com',
            // 'email_verified_at'=>'',
            'password'=>'12345678',
            // 'remember_token'=>'',
            'ranking_1'=>'1',
            'ranking_2'=>'3',
            'ranking_3'=>'4',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'name'=>'山田太郎',
            'email'=>'123456789@gmail.com',
            // 'email_verified_at'=>'',
            'password'=>'12345678',
            // 'remember_token'=>'',
            'ranking_1'=>'1',
            'ranking_2'=>'2',
            'ranking_3'=>'3',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'name'=>'鈴木華',
            'email'=>'12345678910@gmail.com',
            // 'email_verified_at'=>'',
            'password'=>'12345678',
            // 'remember_token'=>'',
            'ranking_1'=>'5',
            'ranking_2'=>'4',
            'ranking_3'=>'3',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
