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
        if(Supplier::count() > 0){
            $suppliers = Supplier::all();
            $count_suppliers = Supplier::count();

            // return
            return [
                "status" => "Success",
                "Number of Suppliers" =>   $count_suppliers,
                "message" => "Suppliers Retrieved successfully",
                "data" => $suppliers
            ];
        }

        // if no record
        else {
            //response
            return [
                "status" => "Error",
                "message" => "Oops!, No Suppliers Found In Database ",

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

        'supplier_code' => 'nullable',
        'supplier_name' => 'required',
        'supplier_register_date' => 'nullable',
        'supplier_email' => 'nullable',
        'supplier_phone' => 'required',
        'supplier_address' => 'nullable',
        'supplier_city' => 'nullable',
        'supplier_country' => 'nullable',
        'supplier_organization' => 'nullable',
        'supplier_status' => 'nullable',
        'supplier_description' => 'nullable',
        'supplier_website_url' => 'nullable',
        'supplier_image' => 'nullable|mimes:doc,pdf,docx,zip,jpeg,jpg,csv,txt,xlx,xls,png',


        ]);

        // create Supplier
        $supplier = new Supplier();
        $supplier->supplier_name      =  $request->supplier_name;
        $supplier->supplier_email     = $request->supplier_email;
        $supplier->supplier_register_date     = $request->supplier_register_date;
        $supplier->supplier_phone     = $request->supplier_phone;
        $supplier->supplier_address     = $request->supplier_address;
        $supplier->supplier_city     = $request->supplier_city;
        $supplier->supplier_country     = $request->supplier_country;
        $supplier->supplier_organization     = $request->supplier_organization;
        $supplier->supplier_status     = $request->supplier_status;
        $supplier->supplier_description     = $request->supplier_description;
        $supplier->supplier_website_url     = $request->supplier_website_url;

         // supplier_image
        if($request->hasfile('supplier_image')){
            $file               = $request->file('supplier_image');
            $extension          = $file->getClientOriginalExtension();  //get image extension
            $filename           = time() . '.' .$extension;
            $file->move('uploads/supplier_images/',$filename);
            $supplier->supplier_image   = url('uploads' . '/supplier_images/'  . $filename);
        }


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
       // find supplier id
       if(Supplier::where("id", $id)->exists()){
        $supplier = Supplier::find($id);

        // return response
        return [
            "status" => 200,
            "message" => "Supplier Retrieved successfully",
            "data" =>$supplier
        ];
    }

     // if no record
     else {

        return [
            "status" => 404,
            "message" => "Oops!, No Supplier Found ",

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
        if(Supplier::where("id", $id)->exists()){
            $supplier   = Supplier::find($id);
            $supplier->supplier_name      =  $request->supplier_name;
            $supplier->supplier_email     = $request->supplier_email;
            $supplier->supplier_register_date     = $request->supplier_register_date;
            $supplier->supplier_phone     = $request->supplier_phone;
            $supplier->supplier_address     = $request->supplier_address;
            $supplier->supplier_city     = $request->supplier_city;
            $supplier->supplier_country     = $request->supplier_country;
            $supplier->supplier_organization     = $request->supplier_organization;
            $supplier->supplier_status     = $request->supplier_status;
            $supplier->supplier_description     = $request->supplier_description;
            $supplier->supplier_website_url     = $request->supplier_website_url;

            // supplier_image
            if($request->hasfile('supplier_image')){
                $file               = $request->file('supplier_image');
                $extension          = $file->getClientOriginalExtension();  //get image extension
                $filename           = time() . '.' .$extension;
                $file->move('uploads/supplier_images/',$filename);
                $supplier->supplier_image   = url('uploads' . '/supplier_images/'  . $filename);
            }

            // save unit
            $supplier->save();

            // generate supplier code
            $supplier_unique_id = $supplier->id;
            $supplier_code = Supplier::find($supplier_unique_id);
            $supplier_code->supplier_code = 'SPL-'.$supplier_unique_id;
            $supplier_code->save();

            // response for success
            return [
                "status" => 200,
                "message" => "Supplier updated successfully",
                "data" => $supplier

            ];
        }
        // if no record by id found
        else {

            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Supplier Found to update ",

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
       if(Supplier::where("id", $id)->exists()){
        $supplier = Supplier::find($id);
        $supplier->delete();
        // response for success
        return [
            "status" => 200,
            "message" => "Supplier Deleted successfully",
            "data" => $supplier,
        ];
    }

    // if no record
    else {
        // response for success
        return [
            "status" => 404,
            "message" => "Oops!, No Supplier Found to Delete "
        ];

    }
    }
}
