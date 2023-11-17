<?php

namespace App\Http\Controllers\Api\v1\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Brand::count() > 0){
            $brands = Brand::all();
            $count_brands = Brand::count();

            // return
            return [
                "status" => "Success",
                "Number of Brands" =>   $count_brands,
                "message" => "Brands Retrieved successfully",
                "data" => $brands
            ];
        }

        // if no record
        else {
            //response
            return [
                "status" => "Error",
                "message" => "Oops!, No Brands Found In Database ",

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

        'brand_code' => 'nullable',
        'brand_name' => 'required',
        'brand_register_date' => 'nullable',
        'brand_status' => 'nullable',
        'brand_image' => 'nullable',
        'brand_description' => 'nullable',

    ]);

    // create brand
    $brand = new Brand();
    $brand->brand_name    = $request->brand_name;
    $brand->brand_register_date    = $request->brand_register_date;
    $brand->brand_status    = $request->brand_status;
    $brand->brand_description    = $request->brand_description;


    // brand_image
    if($request->hasfile('brand_image')){
    $file               = $request->file('brand_image');
    $extension          = $file->getClientOriginalExtension();  //get image extension
    $filename           = time() . '.' .$extension;
    $file->move('uploads/brand_images/',$filename);
    $brand->brand_image   = url('uploads' . '/brand_images/'  . $filename);
}


    // save brand
    $brand->save();

    // generate brand code
    $brand_unique_id = $brand->id;
    $brand_code = Brand::find($brand_unique_id);
    $brand_code->brand_code = 'BRC-'.$brand_unique_id;
    $brand_code->save();

    // response
    return [
        "status" => 200,
        "message" => "Brand Added successfully",
        "data" => $brand
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
        // find brand id
       if(Brand::where("id", $id)->exists()){
        $brand = Brand::find($id);

        // return response
        return [
            "status" => 200,
            "message" => "Brand Retrieved successfully",
            "data" =>$brand
        ];
    }

     // if no record
     else {

        return [
            "status" => 404,
            "message" => "Oops!, No Brand Found ",

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
        if(Brand::where("id", $id)->exists()){
            $brand   = Brand::find($id);
            $brand->brand_name    = $request->brand_name;
            $brand->brand_register_date    = $request->brand_register_date;
            $brand->brand_status    = $request->brand_status;
            $brand->brand_description    = $request->brand_description;


            // brand_image
            if($request->hasfile('brand_image')){
            $file               = $request->file('brand_image');
            $extension          = $file->getClientOriginalExtension();  //get image extension
            $filename           = time() . '.' .$extension;
            $file->move('uploads/brand_images/',$filename);
            $brand->brand_image   = url('uploads' . '/brand_images/'  . $filename);
        }


            // save brand
            $brand->save();

            // generate brand code
            $brand_unique_id = $brand->id;
            $brand_code = Brand::find($brand_unique_id);
            $brand_code->brand_code = 'BRC-'.$brand_unique_id;
            $brand_code->save();

            // response for success
            return [
                "status" => 200,
                "message" => "Brand updated successfully",
                "data" => $brand

            ];
        }
        // if no record by id found
        else {

            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Brand Found to update ",

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
        if(Brand::where("id", $id)->exists()){
            $brand = Brand::find($id);
            $brand->delete();
            // response for success
            return [
                "status" => 200,
                "message" => "Brand Deleted successfully",
                "data" => $brand,
            ];
        }

        // if no record
        else {
            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Brand Found to Delete "
            ];

        }
    }
}
