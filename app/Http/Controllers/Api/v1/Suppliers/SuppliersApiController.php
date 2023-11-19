<?php

namespace App\Http\Controllers\Api\v1\Suppliers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersApiController extends Controller
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

        'supplier_code' => 'nullable',
        'supplier_name' => 'required',
        'supplier_email' => 'nullable',
        'supplier_phone' => 'required',
        'supplier_address' => 'nullable',
        'supplier_city' => 'nullable',
        'supplier_country' => 'nullable',
        'supplier_organization' => 'nullable',
        'supplier_status' => 'nullable',
        'supplier_description' => 'nullable',
        'supplier_website_url' => 'nullable',


        ]);

        // create Supplier
        $supplier = new Supplier();
        $supplier->supplier_name      =  $request->supplier_name;
        $supplier->supplier_email     = $request->supplier_email;
        $supplier->supplier_phone     = $request->supplier_phone;
        $supplier->supplier_address     = $request->supplier_address;
        $supplier->supplier_city     = $request->supplier_city;
        $supplier->supplier_country     = $request->supplier_country;
        $supplier->supplier_organization     = $request->supplier_organization;
        $supplier->supplier_status     = $request->supplier_status;
        $supplier->supplier_description     = $request->supplier_description;
        $supplier->supplier_website_url     = $request->supplier_website_url;

        // save unit
        $supplier->save();

        // generate supplier code
        $supplier_unique_id = $supplier->id;
        $supplier_code = Supplier::find($supplier_unique_id);
        $supplier_code->supplier_code = 'SPL-'.$supplier_unique_id;
        $supplier_code->save();

        // response
        return [
            "status" => 200,
            "message" => "Supplier Added successfully",
            "data" => $supplier
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
