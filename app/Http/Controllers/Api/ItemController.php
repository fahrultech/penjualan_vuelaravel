<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function vueDatatables(Request $request){

    }
    public function index()
    {
        // Find all
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        //Validate the input request
        $this->validate($request, $this->rules(), $this->messages());

        // Insert new item
        $item = new Item;
        $item->item_name = $request->name;
        $item->category_id = $request->category;
        $item->subcategory_id = $request->subcategory;
        $item->save();
    }

    public function show($id)
    {
        // Find item per id and send back to frontend as json format
        $item = Item::find($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        //Validate the input request
        $this->validate($request, $this->rules(), $this->messages());

        // Update item
        $item = Item::find($id);
        $item->item_name = $request->name;
        $item->category_id = $request->category;
        $item->subcategory_id = $request->subcategory;
        $item->sales_price = $request->sales_price;
        $item->purchasing_price = $request->purchasing_price;
        $item->stock = $request->stock;
        $item->save();
    }

    public function destroy($id)
    {
        // Delete item per id
        Item::find($id)->delete();
        return response()->json(array('msg' => 'Item deleted'));
    }

    private function rules(){
        return [
            'name' => 'required',
            'category' => 'required|notIn:0',
            'subcategory' => 'required|notIn:0'
        ];
    }

    private function messages(){
        return [
            'name.required' => 'Nama barang tidak boleh kosong',
            'category.not_in' => 'Kategori barang tidak boleh kosong',
            'subcategory.not_in' => 'Sub kategori barang tidak boleh kosong'
        ];
    }

}
