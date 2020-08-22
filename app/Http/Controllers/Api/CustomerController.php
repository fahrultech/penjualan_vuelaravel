<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function vueDatatables(Request $request){

    }
    public function index()
    {
        //
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        //Validate input request
        $this->validate($request, $this->rules(), $this->messages());

        // Insert new customer to database
        $customer = new Customer;
        $customer->customer_name  = $request->name;
        $customer->address  = $request->address;
        $customer->phone  = $request->phone;
        $customer->city_id  = $request->city_id;
        $customer->city_name  = $request->city_name;
        $customer->province_id  = $request->province_id;
        $customer->province_name  = $request->province_name;
        $customer->save();

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    private function rules(){

        return [
            'customer_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'city_id' => 'notIn:0',
            'province_id' => 'notIn:0'
        ];
    }

    private function messages(){
        return [
            'customer_name.required' => 'Nama customer harus diisi',
            'address.required' => 'Alamat harus diisi',
            'phone.required' => 'No HP harus diisi',
            'city_id.not_in' => 'Kota harus dipilih',
            'province_id.not_in' => 'Propinsi harus dipilih'
        ];
    }
}
