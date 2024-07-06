<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'items';
    protected $fillable = ['id_items','name_items','rack_items','SKU','part_number'];
    
}