<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $post = Api::all();
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                "name" => "Required",
                "stock" => "Required",
                "price" => "Required"
            ]
        );
        $data = new Api();
        $data->name = $request->name;
        $data->stock = $request->stock;
        $data->price = $request->price;
        $data->save();

        return response()->json($data);
    }

    public function show($id, Request $request)
    {
        $post = Api::find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            "name" => "Required",
            "stock" => "Required",
            "price" => "Required"
        ];
        $this->validate($request, $rules);
        $data = new Api();
        $data->name = $request->name;
        $data->stock = $request->stock;
        $data->price = $request->price;
        $data->save();

        return response()->json($data);
    }

    public function destroy($id, Request $request)
    {
        $post = Api::find($id);
        $post->delete();
        return response()->json("Data Berhasil di hapus");
    }
}