<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = ['dpt_name'];
    
    public function municipalitie(){

        return $this->hasMany('App\Municipalitie');
    }

    public function process(){

        return $this->hasMany('App\Process');
    }
}
