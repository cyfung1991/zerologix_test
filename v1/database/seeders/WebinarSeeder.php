<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table("webinars")->insert([
            "title" => $faker->name(),
            "content" => $faker->safeEmail,
            "created_at" => $faker->phoneNumber,
        ]);
    }
}
