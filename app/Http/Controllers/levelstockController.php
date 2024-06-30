<?php

namespace App\Http\Controllers;

use App\Models\detail_stockProblemModel;
use App\Models\stockControlModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class levelstockController extends Controller
{
    // Get Number level stock
    public function updateIdLevel() {
        $idLevel = stockControlModel::orderBy('id_levelStock','desc')->first();
        $res = is_null($idLevel) 
            ? ["id_levelStock" => 1000000] 
            : ["id_levelStock" => $idLevel->id_levelStock + 1];
        return response()->json($res);
    }

    // Get data from func levelstock on Model stockControlModel
    public function levelStockData() {
        $stockControl = new stockControlModel();
        $data = $stockControl->levelstock();
        return response()->json($data);
    }

    // Get All data level stock
    public function index()
    {
        $data = stockControlModel::all();
        return response()->json($data);
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

    public function storeStockControl(Request $request)
    {
        
        $validator = Validator::make($request->all(), 
        [
            "id_levelStock" => "required|numeric",
            "date" => "required|date"
        ],[
            "id_levelStock.numeric" => "data herus berupa number",
            "id_levelStock.required" => "item harus diisi",
            "date.required" => "kolom harus diisi"
        ]);
        if(!$validator) {
            return response()->json(["error" => $validator->error()],500);
        }
        try{
            stockControlModel::create([
                'id_levelStock' => $request->id_levelStock,
                'date' => $request->date
            ]);

            return response()->json(["success" => "success"],200);
        }catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
            // return response()->json(["error" => [$noLevelStock,$date]],500);
        }

    }

    public function storeDetailProblem(Request $request) 
    {   
        try{
            detail_stockProblemModel::create([
                'id_levelStock' => $request->id_levelStock,
                'code_parts' => $request->code_part,
                'remark' => $request->remark,
                'Actual' => $request->actual
            ]);
            return response()->json(['success' => "success"],200);
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
    public function destroyLevelStock(string $id)
    {
        try{
            stockControlModel::where('id_levelstock',$id)->delete();
            return response()->json(["success" => "level stock hapus"],200);
        }catch(Exception $e) {
            return response()->json(["error" => $e->getMessage()],500);
        }
    }

    public function destroyDetailLevelStock(String $id)
    {
        try{
            detail_stockProblemModel::where('id_levelstock',$id)->delete();
            return response()->json(["success" => "detail level stock hapus"],200);
        }catch(Exception $e) {
            return response()->json(["error" => $e->getMessage()],500);
        }
    }
}