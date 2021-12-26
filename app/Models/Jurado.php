<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'jurados';

    public function tesi(){
        return $this->hasMany('App\Models\Tesis');
    }

    public function docente(){
        return $this->belongsTo('App\Models\Docente');
    }
    

}
