<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $timestamps = false;
    protected $table = 'vouchers';
   
    public function practicas(){
        return $this->belongsToMany('App\Models\Practica');
    }
    public function tesis(){
        return $this->belongsToMany('App\Models\Tesis');
    }
    
}
