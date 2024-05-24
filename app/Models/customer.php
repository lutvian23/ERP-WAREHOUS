<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primarykey = 'code_cus';
    protected $keyType = 'string';
    protected $fillable = ['code_cus', 'customer', 'alamat', 'email'];
}
