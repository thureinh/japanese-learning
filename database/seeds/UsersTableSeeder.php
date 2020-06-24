<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 50)->create();
        DB::table('users')->insert([
            'profile_pic' => 'assets/img/sensei.jpg',
            'firstname' => 'Hsumon',
            'lastname' => 'Akira',
            'dateofbirth' => '1989-10-24',
            'phone' => '09-XXX XXX XXX',
            'address' => 'Yangon',
            'email' => 'hsumonakira@gmail.com',
            'email_verified_at' => now(),
            'is_Teacher' => true,
            'password' => Hash::make('12345')
        ]);
    }
}
