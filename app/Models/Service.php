<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    // Asumsikan nama tabelnya 'services' (standar Laravel)
    protected $fillable = ['name', 'description', 'price']; 
}