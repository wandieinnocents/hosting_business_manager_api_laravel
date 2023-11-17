<?php

namespace App\Http\Controllers\Api\v1\Units;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Unit::count() > 0){
            $units = Unit::all();
            $count_units = Unit::count();

            // return
            return [
                "status" => "Success",
                "Number of units" =>   $count_units,
                "message" => "Units Retrieved successfully",
                "data" => $units
            ];
        }

        // if no record
        else {
            //response
            return [
                "status" => "Error",
                "message" => "Oops!, No Units Found In Database ",

            ];

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data fields
       $validatedData = $request->validate([

        'unit_name' => 'required',
        'unit_description' => 'nullable',

        ]);

        // create branch
        $unit = new Unit();
        $unit->unit_name    = $request->unit_name;
        $unit->unit_description     = $request->unit_description;

        // save unit
        $unit->save();

        // response
        return [
            "status" => 200,
            "message" => "Unit Added successfully",
            "data" => $unit
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // find unit id
         if(Unit::where("id", $id)->exists()){
            $unit = Unit::find($id);

            // return response
            return [
                "status" => 200,
                "message" => "Unit Retrieved successfully",
                "data" =>$unit
            ];
        }

         // if no record
         else {

            return [
                "status" => 404,
                "message" => "Oops!, No Unit Found ",

            ];

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find by id
        if(Unit::where("id", $id)->exists()){
            $unit   = Unit::find($id);
            $unit->unit_name    = $request->unit_name;
            $unit->unit_description     = $request->unit_description;

            // save unit
            $unit->save();


            // response for success
            return [
                "status" => 200,
                "message" => "Unit updated successfully",
                "data" => $unit

            ];
        }
        // if no record by id found
        else {

            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Unit Found to update ",

            ];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // find id
       if(Unit::where("id", $id)->exists()){
        $unit = Unit::find($id);
        $unit->delete();
        // response for success
        return [
            "status" => 200,
            "message" => "Unit Deleted successfully",
            "data" => $unit,
        ];
    }

    // if no record
    else {
        // response for success
        return [
            "status" => 404,
            "message" => "Oops!, No Unit Found to Delete "
        ];

    }
}

}
