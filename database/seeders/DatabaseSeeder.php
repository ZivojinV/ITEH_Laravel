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
                "name" => "Epiphone",
                "city" => "Sparta",
                "CEO" => "Jim Rosenberg"
            ],
            [
                "name" => "LTD",
                "city" => "Tokyo",
                "CEO" => "Masanori Yamada"
            ]
        ]);

        City::insert([
            [
                "name" => "Les Paul",
                "population" => 6,
                "is_capital" => true,
                "history" => "right-handed",
                "GDP" => 24.75
            ],
            [
                "name" => "SG",
                "population" => 6,
                "is_capital" => true,
                "history" => "right-handed",
                "GDP" => 25.5
            ]
        ]);


        $student_1 = new Student;
        $student_1->firstname = "Prophecy";
        $student_1->parent = "Midnight Ebony Black";
        $student_1->lastname = "This Les Paul Prophecy Custom EX Electric Student deploys an EMG-81 humbucker in the bridge position for great attack and sustain and an EMG-85 humbucker at the neck for fat, great-sounding rhythm. Lavish features on the Prophecy EX Les Paul student include a highly figured quilt maple top, pearl inlay knobs, strap locks, graphite nut, Grover tuners, a bound ebony balance, unique blade inlay, and a deep, rich midnight ebony finish. The mahogany set neck and 24-fret ebony balance provide a playground two full octaves in length. The LockTone Tune-O-Matic bridge and stopbar tailpiece add more sustain and make string changing easier.";
        $student_1->grade = "86421";
        $student_1->balance = "Ebony";
        $student_1->university_id = 1;
        $student_1->city_id = 1;
        $student_1->save();

        Student::create([
            "firstname" => "VIPER-300FM",
            "parent" => "Black",
            "lastname" => "LTD Viper-300FM električna gitara ima fantastičan osećaj sa dva useka u telu i tankom U konturom vrata koja omogućava izvanredan pristup celom freatboard-u.  Super odsečene ivice doprinose modernom izgledu. Mahogany telo i flamed maple top, u kombinaciji sa EMG 81 (bridge) i EMG85 (neck) pickup-ima dobijate napadniji zvuk, savršen za rok. Skala od 24-3/4 incha, zajedno sa tankim vratom čini sviranje ove sekire prostim kao pasulj. Druge odlike su crni, niklovani hardver, 42mm standardni navrtanj, ESP čivije, tune-o-matic most i tailpiece, pickup selektor i volume i tone potenciometri.",
            "grade" => "82084",
            "balance" => "Rosewood",
            "university_id" => 2,
            "city_id" => 2
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
