<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class itemsController extends Controller
{
    protected $records;
    public function __construct()
    {
        $this->records = new record();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->records->getStock();
        $data = $items->map(function ($items,$index) {
            return [
                "no" => $index + 1,
                "name_items" => $items->name_items,
                "rack_items" => $items->rack_items,
                "id_items" => $items->id_items,
                "SKU" => $items->SKU,
                "stock" => $items->stock
            ];
        });
        return response()->json($data);
    }

    public function statusStock() {
        $items = $this->records->getStock();
        $arrayStatus = [];
        foreach($items as $value) {
            $status = "Advance";
            if($value->stock <= 10) {
                $status = "Supply";
            }else if($value->stock <= 20) {
                $status = "Warning";
            }
            
            if($value->stock <= 20) {
                $arrayStatus[] = [
                    "id_item" => $value->id_items,
                    "stock" => $value->stock,
                    "status" => $status
                ];
            }
        }
        return response()->json($arrayStatus);
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
        $validator = Validator::make($request->all(),
            [
                'id_items' => 'required|unique:items,id_items',
                'name_items' => 'required',
                'rack_items' => 'required',
                'SKU' => 'required|unique:items,SKU'
            ],
            [
                'id_items.required' => 'id items harap diisi',
                'id_items.unique' => 'id items sudah di gunakan',
                'name_items.rquired' => 'nama items harap diisi',
                'SKU.required' => 'SKU harap diisi'
            ]
        );

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        item::make($request->all());
        return response()->json(['success' => 'data berhasil di tambahkan'],200);
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
        //
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
        //
    }
}
