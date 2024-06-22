<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $keyType = 'string';
    protected $primarykey = 'id_items';
    protected $fillabel = ['id_items','name_items','rack_items','SKU'];
    
    public $timestamps = true;
}