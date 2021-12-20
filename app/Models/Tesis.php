<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    use HasFactory;
    protected $table = 'tesis';
    protected $guarded =[];

    public function alumno(){
        return $this->belongsTo('App\Models\Alumno');
    }
    public function docente(){
        return $this->belongsTo('App\Models\Docente');
    }
    
    public function vouchers(){
        return $this->belongsToMany('App\Models\Voucher');
    }  
    public function futs(){
        return $this->belongsToMany('App\Models\Fut');
    } 

    public function docentes(){
        return $this->belongsToMany('App\Models\Docente', 'jurados');
    }
}
