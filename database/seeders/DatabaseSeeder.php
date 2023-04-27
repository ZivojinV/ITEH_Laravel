<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\University;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        University::truncate();
        City::truncate();
        Student::truncate();

        User::factory(10)->create();

        University::insert([
            [
                "name" => "FON",
                "city" => "Belgrade",
                "CEO" => "Dusan Savic"
            ],
            [
                "name" => "FTN",
                "city" => "Novi Sad",
                "CEO" => "Pera Peric"
            ]
        ]);

        City::insert([
            [
                "name" => "Pancevo",
                "population" => 60000,
                "is_capital" => false,
                "history" => "Pancevo is city known for factories and beers.",
                "GDP" => 24.75
            ],
            [
                "name" => "Nis",
                "population" => 72000,
                "is_capital" => false,
                "history" => "Nis has Cele Kula which is made of human skulls.",
                "GDP" => 25.5
            ]
        ]);


        $student_1 = new Student;
        $student_1->firstname = "Zivojin";
        $student_1->parent = "Miroslav";
        $student_1->lastname = "Veljkovic";
        $student_1->grade = "8";
        $student_1->balance = "80000";
        $student_1->university_id = 1;
        $student_1->city_id = 1;
        $student_1->save();

        Student::create([
            "firstname" => "Milan",
            "parent" => "Stefan",
            "lastname" => "Markovic",
            "grade" => "9",
            "balance" => "90000",
            "university_id" => 2,
            "city_id" => 2
        ]);
    }
}
