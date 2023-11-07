<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Api;

class ApiController extends Controller
{
    // Show ALl Data
    public function index(Request $request)
    {
        $post = Api::all();
        return response()->json([
            "status" => "Success",
            "message" => "Data di temukan",
            "data" => $post
        ], 200);
    }

    // Create New Data
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                "name" => "Required",
                "stock" => "Required",
                "price" => "Required"
            ]
        );
        if ($validate->fails()) {
            return response()->json([
                "status" => "Failed",
                "message" => $validate->errors()->first()
            ], 404);
        } else {
            $data = new Api();
            $data->name = $request->input('name');
            $data->stock = $request->input('stock');
            $data->price = $request->input('price');
            $data->save();

            return response()->json([
                'status' => 'Success',
                'message' => 'Data berhasil di tambah',
                'data' => $data
            ], 200);
        }
    }

    // Show Data by ID
    public function show($id, Request $request)
    {
        $post = Api::find($id);
        if ($post) {
            return response()->json([
                "status" => "Success",
                "message" => "Data di temukan",
                "data" => $post
            ], 200);
        } else {
            return response()->json([
                "status" => "Failed",
                "message" => "Data tidak ditemukan"
            ], 404);
        }
    }

    // Update Data
    public function update(Request $request, $id)
    {
        // $rules = [
        //     "name" => "Required",
        //     "stock" => "Required",
        //     "price" => "Required"
        // ];
        // $validate = Validator::make($request->all(), $rules);
        // if ($validate->fails()) {
        //     return response()->json([
        //         "status" => "Failed",
        //         "message" => $validate->errors()->first()
        //     ], 404);
        // } else {
        //     $data = Api::find($id);
        //     $data->name = $request->name;
        //     $data->stock = $request->stock;
        //     $data->price = $request->price;
        //     $data->save();

        //     return response()->json([
        //         "status" => "Success",
        //         "message" => "Data berhasil di Update"
        //     ], 200);
        // }

        $data = Api::find($id);
        if ($data) {
            $data->name = $request->name;
            $data->stock = $request->stock;
            $data->price = $request->price;
            $data->save();

            return response()->json([
                "status" => "Success",
                "message" => "Data berhasil di Update",
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                "status" => "Failed",
                "message" => "Data tidak ditemukan"
            ], 404);
        }
    }

    // Delete Data
    public function destroy($id, Request $request)
    {
        $post = Api::find($id);

        if ($post) {
            $post->delete();
            return response()->json([
                "status" => "Success",
                "message" => "Data berhasil di hapus",
            ], 200);
        } else {
            return response()->json([
                "status" => "Failed",
                "message" => "Data tidak ditemukan"
            ], 404);
        }
    }
}