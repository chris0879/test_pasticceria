<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Admin::create([
            'name'      =>  'Luana',
            'email'     =>  'luana@gmail.com',
            'password'  =>  bcrypt('admin'),
        ]);

        
        Admin::create([
            'name'      =>  'Maria',
            'email'     =>  'maria@gmail.com',
            'password'  =>  bcrypt('admin'),
        ]);


        
    }
}
