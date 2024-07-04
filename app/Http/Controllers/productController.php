<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // func auto part_number,
        $part_number = product::pluck("part_number");
        $partNum_lst = $part_number->last();
        $part_number = is_null($partNum_lst) ? 3000000 : $partNum_lst + 1 ;        

        // data customer
        $customer = customer::pluck("code_cus");
        
        // keluarkan data product
        $product = product::all();
        $product = $product->map(function($product, $index) {
            return [
                "no" => $index + 1,
                "id_product" => $product->id_product,
                "id_customer" => $product->id_customer,
                "part_number" => $product->part_number,
                "id_item" => $product->id_item
            ];

        });
        return response()->json([
            "product" => $product, 
            "customer" => $customer,
            "part_number" => $part_number
        ],
            200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            [
                "part_number" => "unique:product,part_number"
            ],
            [
                "part_number.unique" => "nomber part sudah tersedia"
            ]
        );
        
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        
        try{  
            product::create([
                "id_customer" =>$request->id_customer,
                "part_number" => $request->part_number,
                "id_item" => $request->id_item
            ]);
            return response()->json(["success" => "success"],200);

        }catch(Exception $e) {
            return response()->json(["error" => $e->getMessage()],500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return response()->json(["success" => $id]);
        try{
            $data = product::where('id_product',$id)->firstOrFail();
            return response()->json(["success" => $data],200);
        }catch(ModelNotFoundException $e) {
            return response()->json(["error" => $e->getMessage()],500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            product::where('id_product', $id)->delete();
            return response()->json(["success" => "data berhasil di hapus"]);
        }catch(ModelNotFoundException $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}