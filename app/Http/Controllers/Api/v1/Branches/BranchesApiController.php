<?php

namespace App\Http\Controllers\Api\v1\Branches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Branch::count() > 0){
            $branches = Branch::all();
            $count_branches = Branch::count();

            // return
            return [
                "status" => "Success",
                "Number of Branches" =>   $count_branches,
                "message" => "Branches Retrieved successfully",
                "data" => $branches
            ];
        }

        // if no record
        else {
            //response
            return [
                "status" => "Error",
                "message" => "Oops!, No Branches Found In Database ",

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

        'branch_code' => 'nullable',
        'branch_name' => 'required',
        'branch_address' => 'nullable',

    ]);

    // create branch
    $branch = new Branch();
    $branch->branch_name    = $request->branch_name;
    $branch->branch_address     = $request->branch_address;

    // save branch
    $branch->save();

    // generate branch code
    $branch_unique_id = $branch->id;
    $branch_code = Branch::find($branch_unique_id);
    $branch_code->branch_code = 'BC-'.$branch_unique_id;
    $branch_code->save();

    // response
    return [
        "status" => 200,
        "message" => "Branch Added successfully",
        "data" => $branch
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
        // find branch id
       if(Branch::where("id", $id)->exists()){
        $branch = Branch::find($id);

        // return response
        return [
            "status" => 200,
            "message" => "Branch Retrieved successfully",
            "data" =>$branch
        ];
    }

     // if no record
     else {

        return [
            "status" => 404,
            "message" => "Oops!, No Branch Found ",

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
        if(Branch::where("id", $id)->exists()){
            $branch   = Branch::find($id);
            $branch->branch_name    = $request->branch_name;
            $branch->branch_address     = $request->branch_address;

            // save branch
            $branch->save();

            // response for success
            return [
                "status" => 200,
                "message" => "Branch updated successfully",
                "data" => $branch

            ];
        }
        // if no record by id found
        else {

            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Branch Found to update ",

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
         if(Branch::where("id", $id)->exists()){
            $branch = Branch::find($id);
            $branch->delete();
            // response for success
            return [
                "status" => 200,
                "message" => "Branch Deleted successfully",
                "data" => $branch,
            ];
        }

        // if no record
        else {
            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Branch Found to Delete "
            ];

        }
    }
}
