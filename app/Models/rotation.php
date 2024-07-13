<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class rotation extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "rotations";
    protected $primarykey = "id_rotation";
    protected $fillable = ['code_truck','code_customer','date','status'];

    function addressRotation() {
        $result = DB::table('rotations')
        ->select('rotations.code_truck','customers.alamat','rotations.date','rotations.status')
        ->leftJoin('customers','customers.code_cus','=','rotations.code_customer')
        ->limit(5)
        ->get();

        return $result;
    }

    function monthDelivery() {
        date_default_timezone_set("Asia/Jakarta");
        $month = date("m");
        $result = DB::table('rotations')
        ->select(DB::raw('COUNT(code_customer) AS jumlah'))
        ->whereRaw('MONTH(date) = ?',[$month])
        ->where('status','delivered')
        ->get();

        return $result;
    }

    function deliverydata() {
        $result = DB::table('rotations')
        ->select('rotations.id_rotation','customers.code_cus','rotations.code_truck','customers.alamat','rotations.date','rotations.status')
        ->leftJoin('customers','customers.code_cus','=','rotations.code_customer')
        ->orderBy('rotations.date','desc')
        ->get();
        
        return $result;
    }

}