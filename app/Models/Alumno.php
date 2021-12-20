<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function practica(){
        return $this->hasMany('App\Models\Practica');
    }
    public function tesi(){
        return $this->hasMany('App\Models\Tesis');
    }
    

}
