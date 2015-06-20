<?php

use \App\User;

Class UserTableSeeder extends DatabaseSeeder {

    public function run(){
        $faker = Faker\Factory::Create();
        //Artwork::truncate();

        for ($i=0; $i < 50; $i++){
            $user = User::create(array(
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => $faker->password(6,30),
//                'created_at' => $faker->dateTime('now'),
//                'is_auction' => rand(0,1),
                'username' => $faker->userName(),
                'gender' => $faker->title($gender = 'male'|'female'),
                'date_birth' => $faker->date('now'),
                'address' => $faker->address(),
                'city' => $faker->city(),
                'province_id' => rand(1,34),
                'phone_number' => $faker->phoneNumber(),
                'is_active' => 1,
                'role' => 2,
                'status' => 1,
                'inactive' => 0
            ));
        }
    }
}