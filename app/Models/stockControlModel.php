<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class stockControlModel extends Model
{
    use HasFactory;
    protected $table = "levelstock";
    protected $fillable = ["id_levelStock","date"];

    public $timestamps = false;

    public function levelstock() {
        try{
            $result = DB::table('detail_stockproblem')
                ->select(
                    "levelstock.id_levelStock","levelstock.date",
                    DB::raw('SUM(detail_stockProblem.Actual) AS Actual')
                )
                ->rightJoin("levelstock","levelstock.id_levelStock","=","detail_stockproblem.id_levelStock")
                ->groupBy("levelstock.id_levelStock","levelstock.date")
                ->get();

            return $result;
        }catch(Exception $e) {
            dd($e->getMessage());
        }
        
    }

}