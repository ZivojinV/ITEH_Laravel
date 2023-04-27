<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //GET
    //localhost:8000/api/students
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return StudentResource::collection(Student::all());
        return new StudentCollection(Student::all());
    }

    //GET
    //localhost:8000/api/students/{studentID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $studentID
     * @return \Illuminate\Http\Response
     */
    public function show($studentID)
    {
        $student = Student::find($studentID);
        return is_null($student) ? response()->json('Data not found', 404) : new StudentResource($student);
    }


    //DELETE
    //localhost:8000/api/students/{studentID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $studentID
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentID)
    {
        $student = Student::where('id', $studentID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Student deleted successfully.",
            "data" => $student
        ]);
    }
}
