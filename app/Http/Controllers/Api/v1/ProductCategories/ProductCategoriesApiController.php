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
        // Fetch all products with their category
        // $products = Product::with('category')->get();

        // // Access the category of a product
        // foreach ($products as $product) {
        //     echo $product->name . ' belongs to category: ' . $product->category->name;
        // }

        // // Fetch all products for a specific category
        // $category = Category::find(1);
        // $categoryProducts = $category->products;


        if(ProductCategory::count() > 0){
            $product_categories = ProductCategory::orderBy('id', 'desc')->get();;
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
            'parent_product_category_id' => 'required',
            'product_category_code' => 'nullable',
            'product_category_name' => 'required',
            'product_category_description' => 'nullable',
            'product_category_status' => 'nullable',
            'product_category_image' => 'nullable',

        ]);

        // create customer
        $product_category = new ProductCategory();
        $product_category->parent_product_category_id    = $request->parent_product_category_id;
        // $product_category->product_category_code    = $request->product_category_code;
        $product_category->product_category_name    = $request->product_category_name;
        $product_category->product_category_description    = $request->product_category_description;
        $product_category->product_category_status    = $request->product_category_status;

        // image

         // product_category_image
         if($request->hasfile('product_category_image')){
            $file               = $request->file('product_category_image');
            $extension          = $file->getClientOriginalExtension();  //get image extension
            $filename           = time() . '.' .$extension;
            $file->move('uploads/product_category_images/',$filename);
            $product_category->product_category_image   = url('uploads' . '/product_category_images/'  . $filename);
        }


        // save product_categories
        $product_category->save();

          // add a unique id
        $product_category_unique_id = $product_category->id;
        $product_category_code = ProductCategory::find($product_category_unique_id);
        $product_category_code->product_category_code = 'PCAT-'.$product_category_unique_id;
        $product_category_code->save();


        // response
        return [
            "status" => 200,
            "message" => "Product Category Added successfully",
            "data" => $product_category
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
            $product_category->parent_product_category_id    = $request->parent_product_category_id;
            // $product_category->product_category_code    = $request->product_category_code;
            $product_category->product_category_name    = $request->product_category_name;
            $product_category->product_category_description    = $request->product_category_description;
            $product_category->product_category_status    = $request->product_category_status;

            // image

             // product_category_image
             if($request->hasfile('product_category_image')){
                $file               = $request->file('product_category_image');
                $extension          = $file->getClientOriginalExtension();  //get image extension
                $filename           = time() . '.' .$extension;
                $file->move('uploads/product_category_images/',$filename);
                $product_category->product_category_image   = url('uploads' . '/product_category_images/'  . $filename);
            }


            // save product_categories
            $product_category->save();

              // add a unique id
            $product_category_unique_id = $product_category->id;
            $product_category_code = ProductCategory::find($product_category_unique_id);
            $product_category_code->product_category_code = 'PCAT-'.$product_category_unique_id;
            $product_category_code->save();


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
