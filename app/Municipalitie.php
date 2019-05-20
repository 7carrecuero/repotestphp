<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipalitie extends Model
{
    protected $table = 'municipalities';

    protected $fillable = ['mcp_name','id'];
    
    public function department(){

        return $this->belongsTo('App\Department');
    }

    public function processes(){

        return $this->hasMany('App\Process');
    }
}
