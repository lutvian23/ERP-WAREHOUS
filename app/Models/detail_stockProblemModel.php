<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_stockProblemModel extends Model
{
    use HasFactory;
    protected $table = "detail_stockproblem";
    public $timestamps = false;
    protected $fillable = [
        "id_levelStock",
        "code_parts",
        "remark",
        "Actual"
    ];

}