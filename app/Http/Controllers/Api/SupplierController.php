<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function vueDatatables(Request $request){

    }
    public function index()
    {
        //Get all supplier and send back to frontend on json format
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    public function store(Request $request)
    {
        //Validasi input request
        $this->validate($request, $this->rules(), $this->messages());

        // Insert new supplier data
        $supplier = new Supplier;
        $supplier->supplier_name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();
    }

    public function show($id)
    {
        //Search or find supplier based on id
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    public function update(Request $request, $id)
    {
        //Validasi input request
        $this->validate($request, $this->rules(), $this->messages());

        // Update supplier based on id
        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->save();
    }

    public function destroy($id)
    {
        //Find supplier based on id and delete
        Supplier::find($id)->delete();
        return response()->json(array('msg' => 'deleted'));
    }

    private function rules(){
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];
    }

    private function messages(){
        return [
            'name.required' => 'Nama supplier harus diisi ',
            'address.required'=> 'Alamat harus diisi',
            'phone.required' => 'No HP harus diisi'
        ];
    }
}
