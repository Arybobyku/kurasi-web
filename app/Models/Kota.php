<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'ms_kota';
    protected $primaryKey = 'id';
    
    use HasFactory;
}
