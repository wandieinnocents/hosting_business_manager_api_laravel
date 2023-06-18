<?php

namespace App\Http\Controllers\Api\v1\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Customer::count() > 0){
            $customers = Customer::all();
            $count_customers = Customer::count();

            // return
            return [
                "status" => "Success",
                "Number of Customers" =>   $count_customers,
                "message" => "Customers Retrieved successfully",
                "data" => $customers
            ];
        }

        // if no record
        else {
            //response
            return [
                "status" => "Error",
                "message" => "Oops!, No Customers Found in Database ",

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers',
            'address' => 'required',
            'organization' => 'required',

        ]);

        // create customer
        $customer = new Customer();
        $customer->first_name    = $request->first_name;
        $customer->last_name     = $request->last_name;
        $customer->email         = $request->email;
        $customer->phone         = $request->phone;
        $customer->address       = $request->address;
        $customer->organization  = $request->organization;

        // save customer
        $customer->save();

        // response
        return [
            "status" => 200,
            "message" => "customer Added successfully",
            "data" => $customer
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
       // find Customer id
       if(Customer::where("id", $id)->exists()){
        $customer = Customer::find($id);

        // return response
        return [
            "status" => 200,
            "message" => "Customer Retrieved successfully",
            "data" =>$customer
        ];
    }

     // if no record
     else {

        return [
            "status" => 404,
            "message" => "Oops!, No Customer Found ",

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

        if(Customer::where("id", $id)->exists()){
            $customer   = Customer::find($id);
            $customer->first_name = !empty($request->first_name)? $request->first_name: $customer->first_name;
            $customer->last_name = !empty($request->last_name)? $request->last_name: $customer->last_name;
            $customer->email = !empty($request->email)? $request->email: $customer->email;
            $customer->phone = !empty($request->phone)? $request->phone: $customer->phone;
            $customer->address = !empty($request->address)? $request->address: $customer->address;
            $customer->organization = !empty($request->organization)? $request->organization: $customer->organization;

            // save Customer
            $customer->save();

            // response for success
            return [
                "status" => 200,
                "message" => "Customer updated successfully",
                "data" => $customer

            ];
        }
        // if no record by id found
        else {

            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Customer Found to update ",

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
        if(Customer::where("id", $id)->exists()){
            $customer = Customer::find($id);
            $customer->delete();
            // response for success
            return [
                "status" => 200,
                "message" => "Customer Deleted successfully",
                "data" => $customer,
            ];
        }

        // if no record
        else {
            // response for success
            return [
                "status" => 404,
                "message" => "Oops!, No Customer Found to Delete "
            ];

        }
    }
}
