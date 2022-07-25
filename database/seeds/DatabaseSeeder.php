<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //we create a new user
        \App\User::create([
         'firstname' => 'Ndibem',
         'lastname' => 'Kenwizzy',
         'email' => 'sam@gmail.com',
         'password' => Hash::make(12345678),
         'active' => 1,
         'role_id' =>2,
        ]);

        \App\User::create([
            'firstname' => 'Lola',
            'lastname' => 'Lucky',
            'email' => 'taiwo@gmail.com',
            'password' => Hash::make(12345678),
            'active' => 1,
            'role_id' => 1,
           ]);


           App\Category::create([
            'name' => 'Amazon',
           ]);

        App\Category::create([
         'name' => 'Apple Store',
        ]);

     \App\SubCategory::create([
         'name' => 'Germany Amazon (Cash Receipt)',
         'category_id' => 1,
         'amount' => 23000,
     ]);

     \App\SubCategory::create([
        'name' => 'Germany Amazon (No Receipt)',
        'category_id' => 1,
        'amount' => 22000,
    ]);

    \App\SubCategory::create([
        'name' => 'UK Amazon (Cash Receipt)',
        'category_id' => 1,
        'amount' => 28000,
    ]);

    \App\SubCategory::create([
        'name' => 'Germany Amazon (No Receipt)',
        'category_id' => 1,
        'amount' => 19000,
    ]);

    \App\SubCategory::create([
        'name' => 'Germany Apple Store (Cash Receipt)',
        'category_id' => 2,
        'amount' => 40000,
    ]);

    \App\SubCategory::create([
        'name' => 'Germany Apple Store (No Receipt)',
        'category_id' => 2,
        'amount' => 600,
    ]);

    \App\SubCategory::create([
        'name' => 'Nigeria Apple Store (Cash Receipt)',
        'category_id' => 2,
        'amount' => 1000,
    ]);

    \App\SubCategory::create([
        'name' => 'Lagos Apple Store (Cash Receipt)',
        'category_id' => 2,
        'amount' => 40000,
    ]);

    \App\Account::create([
        'user_id' => 1,
    ]);

    \App\Account::create([
        'user_id' => 2,
    ]);

    \App\Role::create([
        'name' => 'User',
    ]);

    \App\Role::create([
        'name' => 'Admin',
    ]);



    }
}
