<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class call extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'ecosermy_charge_id', 'area_id', 'description', 'status'];
    public function ecosermy_charge()
    {
        return $this->belongsTo('App\Models\ecosermyCharge');
    }
    public function area()
    {
        return $this->belongsTo('App\Models\area');
    }
}
