<?php

namespace App\Http\Controllers\Api\v1\ProductCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoriesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(ProductCategory::count() > 0){
            $product_categories = ProductCategory::all();
            $count_product_categories = ProductCategory::count();

            // return
            return [
                "status" => "Success",
                "Number of Product Categories" =>   $count_product_categories,
                "message" => "Product Categories Retrieved successfully",
                "data" => $product_categories
            ];
        }

        // if no record
        else {
            //response
            return [
                "status" => "Error",
                "message" => "Oops!, No Product Category Found in Database ",

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
        // dd("adfafaf");

        // validate data fields
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',

        ]);

        // create customer
        $product_categories = new ProductCategory();
        $product_categories->name    = $request->name;
        $product_categories->description     = $request->description;

        // save product_categories
        $product_categories->save();

        // response
        return [
            "status" => 200,
            "message" => "Product Category Added successfully",
            "data" => $product_categories
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
       // find product_category id
       if(ProductCategory::where("id", $id)->exists()){
        $product_category = ProductCategory::find($id);

        // return response
        return [
            "status" => 200,
            "message" => "Product Category Retrieved successfully",
            "data" =>$product_category
        ];
    }

     // if no record
     else {

        return [
            "status" => 404,
            "message" => "Oops!, No Product Category Found ",

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
        // find id
        if(ProductCategory::where("id", $id)->exists()){

            $product_category = ProductCategory::find($id);
            $product_category->name = $request->name;
            $product_category->description = $request->description;
            $product_category->save();

            // response for success
             return [
                "status" => 200,
                "message" => "Product Category updated successfully",
                "data" => $product_category

            ];
        }
        // if no record by id found
        else {

            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Product Category Found to update ",

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
         if(ProductCategory::where("id", $id)->exists()){
            $product_category = ProductCategory::find($id);
            $product_category->delete();

            // response for success
            return [
                "status" => 200,
                "message" => "ProductCategory Deleted successfully",
                "data" => $product_category,
            ];
        }

        // if no record
        else {
            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Product Category Found to Delete "
            ];

        }
    }
}
