<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chinalcoCharge extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
}
