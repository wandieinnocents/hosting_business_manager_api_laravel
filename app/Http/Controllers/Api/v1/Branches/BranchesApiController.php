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
        //
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
    $branch_serial_number = Branch::find($branch_unique_id);
    $branch_serial_number->branch_serial_number = 'BC-'.$branch_unique_id;
    $branch_serial_number->save();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
