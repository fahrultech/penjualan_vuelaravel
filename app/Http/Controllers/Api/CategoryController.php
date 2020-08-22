<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function vueDatatables(Request $request){

    }
    public function index()
    {
        //
        return Category::all();
    }

    public function store(Request $request)
    {
        // Validate from input request
        $this->validate($request, $this->rules(), $this->messages());

        // Insert new category
        $category = new Category;
        $category->category_name = $request->name;
        $category->save();
    }

    public function show($id)
    {
        //Find category as per id and send back as json format
        $category = Category::find($id);
        return response()->json($id);
    }

    public function update(Request $request, $id)
    {
        //
        // Validate from input request
        $this->validate($request, $this->rules(), $this->messages());

        // Insert new category
        $category = Category::find($id);
        $category->category_name = $request->name;
        $category->save();
    }

    public function destroy($id)
    {
        //Find category and delete
        Category::find($id)->delete();
        return response()->json(array('msg' => 'deleted'));
    }

    private function rules(){
        return [
            'name' => 'required'
        ];
    }

    private function messages(){
        return [
            'name.required' => 'Nama kategori tidak boleh kosong'
        ];
    }
}
