<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\item;
use App\Models\product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Events\ResponsePrepared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{

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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try{ 
            $SKU = $request->id_item . "LB";
            DB::beginTransaction();
            product::create([
                "id_customer" => $request->id_customer,
                "part_number" => $request->part_number,
                "id_item" => $request->id_item
            ]);

            item::create([
                "id_items" => $request->id_item,
                "name_items" => $request->name_part,
                "rack_items" => $request->racks,
                "SKU" => $SKU,
                "part_number" => $request->part_number
            ]);
            DB::commit();
            return response()->json(["success" => "success"],200);
        }catch(Exception $e) {
            DB::rollBack();
            return response()->json(["error" => $e->getMessage()],500);
        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $part_number)
    {
        try{
            $dataProduct = product::where('part_number',$part_number)->firstOrFail();
            $dataItem = item::where('part_number',$part_number)->firstOrFail();
            return response()->json(["success" => [$dataItem,$dataProduct]],200);
        }catch(ModelNotFoundException $e) {
            return response()->json(["error" => $e->getMessage()],500);
        }
    }


    public function update(Request $request, string $part_number)
    {
        try{
            $validator = Validator::make($request->all(), [
                "id_customer" => "required",
                "part_number" => "required",
                "id_item" => "required",
                "name_items" => "required",
                "rack_items" => "required",
            ],
            [
                "id_customer.required" => "code customer kosong !",
                "part_number.required" => "part number kosong !",
                "id_item.required" => "item kosong !",
                "name_items.required" => "nama item kosong !",
                "rack_items.required" => "rak kosong !" 
            ]);
            
            if($validator->fails()) {
                return response()->json(["err" => $validator->messages()]);
            }
            
            $SKU = $request->id_item . "LB";
            DB::beginTransaction();
                product::where('part_number', $part_number)->update([
                    "id_customer" => $request->id_customer,
                    "part_number" => $request->part_number,
                    "id_item" => $request->id_item
                ]);
                item::where('part_number', $part_number)->update([
                    "id_items" => $request->id_item,
                    "name_items" => $request->name_items,
                    "rack_items" => $request->rack_items,
                    "SKU" => $SKU,
                    "part_number" => $request->part_number
                ]);
            DB::commit();
            return response()->json(["success" => "data berhasil di ubah"],200);
        }catch(Exception $e) {
            DB::rollBack();
            return response()->json(["message" => "terjadi kesalahan","error" => $e->getMessage()],500);
        }
    }


    public function destroy(string $part_number)
    {
        try{
            DB::beginTransaction();
            product::where('part_number', $part_number)->delete();
            item::where('part_number', $part_number)->delete();
            DB::commit();
            return response()->json(["success" => "data berhasil di hapus"]);
        }catch(ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json(["error" => $e->getMessage()]);
        }
    }
}