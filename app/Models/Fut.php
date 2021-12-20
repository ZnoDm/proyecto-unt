<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fut extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'futs';

    public function practicas(){
        return $this->belongsToMany('App\Models\Practica');
    }
    public function tesis(){
        return $this->belongsToMany('App\Models\Tesis');
    }
}
