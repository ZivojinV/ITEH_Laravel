<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Models\Student;
use Illuminate\Http\Request;

class CityStudentController extends Controller
{
    public function index($cityID)
    {
        $students = Student::get()->where('city_id', $cityID);
        if(is_null($students)) {
            return response()->json('Data not found', 404);
        }
        return new StudentCollection($students);
    }
}
