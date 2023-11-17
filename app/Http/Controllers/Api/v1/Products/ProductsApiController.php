<?php

namespace App\Http\Controllers\Api\v1\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Product::count() > 0){
            $products = Product::all();
            $count_products = Product::count();

            // return
            return [
                "status" => "Success",
                "Number of products" =>   $count_products,
                "message" => "Products Retrieved successfully",
                "data" => $products
            ];
        }

        // if no record
        else {
            //response
            return [
                "status" => "Error",
                "message" => "Oops!, No Products Found In Database ",

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

        'product_code' => 'nullable',
        'supplier_id' => 'nullable',
        'product_brand_id' => 'nullable',
        'product_parent_category_id' => 'nullable',
        'product_category_id' => 'nullable',
        'product_unit_id' => 'nullable',
        'product_created_date' => 'nullable',
        'product_expiry_date' => 'nullable',
        'product_name' => 'required',
        'product_stock_quantity' => 'nullable',
        'product_cost_price' => 'nullable',
        'product_selling_price' => 'nullable',
        'product_status' => 'nullable',
        'product_description' => 'nullable',
        'product_image' => 'nullable|mimes:doc,pdf,docx,zip,jpeg,jpg,webp,tif,csv,txt,xlx,xls,png',

        ]);

        // create branch
        $product = new Product();
        $product->supplier_id    = $request->supplier_id;
        $product->product_brand_id     = $request->product_brand_id;
        $product->product_parent_category_id     = $request->product_parent_category_id;
        $product->product_category_id     = $request->product_category_id;
        $product->product_unit_id     = $request->product_unit_id;
        $product->product_created_date     = $request->product_created_date;
        $product->product_expiry_date     = $request->product_expiry_date;
        $product->product_name     = $request->product_name;
        $product->product_stock_quantity     = $request->product_stock_quantity;
        $product->product_cost_price     = $request->product_cost_price;
        $product->product_selling_price     = $request->product_selling_price;
        $product->product_status     = $request->product_status;
        $product->product_description     = $request->product_description;


         // product_image
            if($request->hasfile('product_image')){
                $file               = $request->file('product_image');
                $extension          = $file->getClientOriginalExtension();  //get image extension
                $filename           = time() . '.' .$extension;
                $file->move('uploads/product_images/',$filename);
                $brand->product_image   = url('uploads' . '/product_images/'  . $filename);
            }


        // save unit
        $product->save();

        // generate product code
        $product_unique_id = $product->id;
        $product_code = Product::find($product_unique_id);
        $product_code->product_code = 'PRD-'.$product_unique_id;
        $product_code->save();

        // response
        return [
            "status" => 200,
            "message" => "Product Added successfully",
            "data" => $product
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
       if(Product::where("id", $id)->exists()){
        $product = Product::find($id);

        // return response
        return [
            "status" => 200,
            "message" => "Product Retrieved successfully",
            "data" =>$product
        ];
    }

     // if no record
     else {

        return [
            "status" => 404,
            "message" => "Oops!, No Product Found ",

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

        if(Product::where("id", $id)->exists()){
            $product   = Product::find($id);
            $product->supplier_id    = $request->supplier_id;
            $product->product_brand_id     = $request->product_brand_id;
            $product->product_parent_category_id     = $request->product_parent_category_id;
            $product->product_category_id     = $request->product_category_id;
            $product->product_unit_id     = $request->product_unit_id;
            $product->product_created_date     = $request->product_created_date;
            $product->product_expiry_date     = $request->product_expiry_date;
            $product->product_name     = $request->product_name;
            $product->product_stock_quantity     = $request->product_stock_quantity;
            $product->product_cost_price     = $request->product_cost_price;
            $product->product_selling_price     = $request->product_selling_price;
            $product->product_status     = $request->product_status;
            $product->product_description     = $request->product_description;


             // product_image
                if($request->hasfile('product_image')){
                    $file               = $request->file('product_image');
                    $extension          = $file->getClientOriginalExtension();  //get image extension
                    $filename           = time() . '.' .$extension;
                    $file->move('uploads/product_images/',$filename);
                    $brand->product_image   = url('uploads' . '/product_images/'  . $filename);
                }


            // save unit
            $product->save();

            // generate product code
            $product_unique_id = $product->id;
            $product_code = Product::find($product_unique_id);
            $product_code->product_code = 'PRD-'.$product_unique_id;
            $product_code->save();

            // response for success
            return [
                "status" => 200,
                "message" => "Product updated successfully",
                "data" => $product

            ];
        }
        // if no record by id found
        else {

            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Product Found to update ",

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
       if(Product::where("id", $id)->exists()){
        $product = Product::find($id);
        $product->delete();
        // response for success
        return [
            "status" => 200,
            "message" => "Product Deleted successfully",
            "data" => $product,
        ];
    }

    // if no record
    else {
        // response for success
        return [
            "status" => 404,
            "message" => "Oops!, No Product Found to Delete "
        ];


}
    }
}
