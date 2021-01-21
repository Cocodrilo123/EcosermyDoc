<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class census extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'last_name', 'DNI', 'partner_id', 'kin_id'];
    public function partner()
    {
        return $this->belongsTo('App\Models\partner');
    }
    public function kin()
    {
        return $this->belongsTo('App\Models\kin');
    }
}
