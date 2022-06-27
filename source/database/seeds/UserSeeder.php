<?php

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'address' => NULL,
            'phone' => NULL,
            'flag' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'remember_token' => NULL,
            'deleted_at' => NULL,
            'created_at' => '2022-06-02 00:25:49',
            'updated_at' => '2022-06-01 18:47:03',
        ]);
        factory(User::class, 100)->create();
    }
}
