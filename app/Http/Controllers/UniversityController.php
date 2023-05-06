<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniversityCollection;
use App\Http\Resources\UniversityResource;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniversityController extends Controller
{
    //GET
    //localhost:8000/api/universities
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return UniversityResource::collection(University::all());
        return new UniversityCollection(University::all());
    }


    //POST
    //localhost:8000/api/universities
    //BODY = University Model

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $university = University::create($input);
        return response()->json([
            "success" => true,
            "message" => "Data created successfully.",
            "data" => $university
        ]);
    }

    //GET
    //localhost:8000/api/universities/{universityID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $universityID
     * @return \Illuminate\Http\Response
     */
    public function show($universityID)
    {
        $university = University::find($universityID);
        return is_null($university) ? response()->json('Data not found', 404) : new UniversityResource($university);
    }


    //PUT/PATCH
    //localhost:8000/api/universities/{universityID}
    //BODY = University Model

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'CEO' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $university->name = $input['name'];
        $university->CEO = $input['CEO'];
        $university->save();
        return response()->json([
            "success" => true,
            "message" => "University updated successfully.",
            "data" => $university
        ]);
    }


    //DELETE
    //localhost:8000/api/universities/{universityID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $universityID
     * @return \Illuminate\Http\Response
     */
    public function destroy($universityID)
    {
        $university = University::where('id', $universityID)->delete();
        return response()->json([
            "success" => true,
            "message" => "University deleted successfully.",
            "data" => $university
        ]);
    }
}
