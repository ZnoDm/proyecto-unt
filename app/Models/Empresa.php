<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $timestamps = false;
    protected $table = 'empresas';
    protected $guarded =[];
    use HasFactory;

    public function practica(){
        return $this->hasMany('App\Models\Practica');
    }
}
