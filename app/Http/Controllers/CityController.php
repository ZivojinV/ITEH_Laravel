<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityCollection;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    //GET
    //localhost:8000/api/cities
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return CityResource::collection(City::all());
        return new CityCollection(City::all());
    }


    //POST
    //localhost:8000/api/cities
    //BODY = City Model

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
        $city = City::create($input);
        return response()->json([
            "success" => true,
            "message" => "Data created successfully.",
            "data" => $city
        ]);
    }

    //GET
    //localhost:8000/api/cities/{cityID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($cityID)
    {
        $city = City::find($cityID);
        return is_null($city) ? response()->json('Data not found', 404) : new CityResource($city);
    }


    //DELETE
    //localhost:8000/api/cities/{cityID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $cityID
     * @return \Illuminate\Http\Response
     */
    public function destroy($cityID)
    {
        $city = City::where('id', $cityID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Body Type deleted successfully.",
            "data" => $city
        ]);
    }
}
