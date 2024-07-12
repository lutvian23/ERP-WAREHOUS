<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truck extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "trucks";
    protected $primarykey = "id_truck";
    protected $fillable = ['code_truck','name_truck','type_truck'];

}