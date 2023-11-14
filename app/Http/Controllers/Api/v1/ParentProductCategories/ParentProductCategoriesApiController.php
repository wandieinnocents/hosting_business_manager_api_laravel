<?php

namespace App\Http\Controllers\Api\v1\ParentProductCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentProductCategory;

class ParentProductCategoriesApiController extends Controller
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
        'parent_product_category_code' => 'nullable',
        'parent_product_category_name' => 'required',
        'parent_product_category_description' => 'nullable',
        'parent_product_category_status' => 'nullable',

    ]);

    // create customer
    $parent_product_category = new ParentProductCategory();
    $parent_product_category->parent_product_category_name     = $request->parent_product_category_name;
    $parent_product_category->parent_product_category_description     = $request->parent_product_category_description;
    $parent_product_category->parent_product_category_status     = $request->parent_product_category_status;

    // save parent_product_category
    $parent_product_category->save();

    // add a unique id
    $parent_product_category_unique_id = $parent_product_category->id;
    $parent_product_category_code = ParentProductCategory::find($parent_product_category_unique_id);
    $parent_product_category_code->parent_product_category_code = 'PC-'.$parent_product_category_unique_id;
    $parent_product_category_code->save();

    // response
    return [
        "status" => 200,
        "message" => "Parent Product Category Added successfully",
        "data" => $parent_product_category
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
