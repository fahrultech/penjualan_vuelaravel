<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;

class SubcategoryController extends Controller
{
    public function vueDatatables(Request $request){

    }
    public function index()
    {
        //
        $subcategory = Subcategory::all();
        return response()->json($subcategory);
    }

    public function store(Request $request)
    {
        //
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
}
