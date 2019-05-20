<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessStepApprover extends Model
{
    protected $table = 'process_step_approver';

    protected $fillable = ['pcs_id','user_id','psa_step'];

    public function user(){

        return $this->belongsTo('App\User', 'id');
    }

    public function process(){

        return $this->belongsTo('App\Process', 'id');
    }

    
}
