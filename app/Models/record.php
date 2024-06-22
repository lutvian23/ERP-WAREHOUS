<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class record extends Model
{
    use HasFactory;

    protected $table = "records";
    protected $primarykey = "id";
    protected $fillable = ["item","status"];


    function getStock() {
        try{
            $result = DB::table('records')
            ->select(
                'items.name_items','items.rack_items','items.id_items','items.SKU',
                DB::raw('COUNT(CASE WHEN records.status = "IN" THEN records.item ELSE NULL END) - COUNT(CASE WHEN records.status = "OUT" THEN records.item ELSE NULL END) AS stock')
            )
            ->rightJoin('items','records.item','=','items.id_items')
            ->groupBy('items.name_items','items.rack_items','items.id_items','items.SKU')
            ->get();
            return $result;
        }catch(\Exception $e) {
            dd($e->getMessage());
        }
        
    }

    function getStatusStock() {
        $result = DB::table('records')
        ->select(
            'items.id_items',
            DB::raw('COUNT(CASE WHEN records.status = "IN" THEN records.item ELSE NULL END) - COUNT(CASE WHEN records.status = "OUT" THEN records.item ELSE NULL END) AS stock')
            )
        ->rightJoin('items','records.item','=','items.id_items')
        ->groupBy('items.id_items')
        ->get();
        return $result;
    }
}
