<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "products";
    protected $primarykey = 'id_product'; 
    protected $fillable = ['id_customer','part_number','id_item'];

}