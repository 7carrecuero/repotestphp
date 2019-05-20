<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'processes';

    protected $fillable = ['pcs_description','pcs_initial_date','pcs_final_date','pcs_state','pcs_current_step','pcs_comments','pcs_document','dpt_id','mcp_id'];
    
    public function user(){

        return $this->belongsTo('App\User', 'id');
    }

    public function processstepapprover(){

        return $this->hasMany('App\ProcessStepApprover');
    }

    public function department(){

        return $this->belongsTo('App\Department', 'id');
    }

    public function municipalitie(){

        return $this->belongsTo('App\Municipalitie', 'id');
    }

    public function scopeSearch($query, $uid, $date, $state){

        if($state == null){
            
            $query->where("usr_id","=",$uid);

        }else{

            $query->where("usr_id","=",$uid)->where('pcs_state','=',$state);

        }
        

        if(isset($date) && !empty($date) ){
            $query = $query->where('pcs_initial_date','=',$date);        
        }
        return $query;  

    }

    public function scopeSearchApprover($query, $date, $state){

        if($state != null){

            $query->where('pcs_state','=',$state);

        }
        

        if(isset($date) && !empty($date) ){
            $query = $query->where('pcs_initial_date','=',$date);        
        }
        return $query;  

    }
}
