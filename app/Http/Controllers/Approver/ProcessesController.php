<?php

namespace App\Http\Controllers\Approver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Process;
use App\Department;
use App\ProcessStepApprover;
use App\Http\Requests\ProcessesStep2Request;
use App\Http\Requests\ProcessesStep4Request;

class ProcessesController extends Controller
{
    public function index(Request $request)
    {   
        
        if(isset($request->initial_date) && !empty($request->initial_date)){
            $date = str_replace("/", "-", $request->initial_date);
            $request->initial_date = \Carbon\Carbon::parse($date)->format('Y-m-d');
        }

        $processes = Process::searchApprover($request->initial_date, $request->state)->paginate(5);

        return view('approver.processes.index')
                ->with('processes', $processes)
                ->with('initial_date', $request->initial_date)
                ->with('state', $request->state);

    }

    public function stepOne($id)
    {
        $process = Process::find($id);
        if($process->pcs_final_date > date('Y-m-d')){

            return view('approver.processes.step1')->with("process",$process);
            
        }else{

            return redirect()->route('processesAp.index');

        }
    }

    public function stepTwo($id)
    {
        $process = Process::find($id);
        if($process->pcs_final_date > date('Y-m-d')){

            return view('approver.processes.step2')->with("process",$process);
                
        }else{

            return redirect()->route('processesAp.index');

        }
    }

    public function editStepTwo(ProcessesStep2Request $request,$id)
    {
        $process = Process::find($request->id);
        $process->pcs_initial_date = $request->initial_date;
        $process->pcs_final_date = $request->final_date;
        if($process->pcs_current_step < 2){ 

            $process->pcs_current_step = 2; 

            $processStepApprover = new ProcessStepApprover();
            $processStepApprover->usr_id = \Auth::user()->id;
            $processStepApprover->pcs_id = $process->id;
            $processStepApprover->psa_step = 2;
            $processStepApprover->save();
        }
        
        $processStepApprover = new ProcessStepApprover();
        $processStepApprover->user_id = \Auth::user()->id;
        $processStepApprover->pcs_id = $process->id;
        $processStepApprover->psa_step = $process->id;

        $process->save();

        // flash('Se ha actualizado de manera exitosa!');
        return redirect()->route('processesAp.step3',$id);
    }

    public function stepThree($id)
    {
        $process = Process::find($id);

        if($process->pcs_final_date > date('Y-m-d')){
            if($process->pcs_current_step >= 3){

                return view('approver.processes.step3')->with("process",$process);
             
             }else{
 
                 return redirect()->route('alertapprover');
 
             }

        }else{

            return redirect()->route('processesAp.index');

        }
    }

    public function stepFour($id)
    {
        $process = Process::find($id);

        $count = ProcessStepApprover::where("pcs_id","=",$process->id)
                                        ->where("psa_step","=",4)->count();

        // dd($count);

        ProcessStepApprover::where("usr_id","=",\Auth::user()->id)
                            ->where("pcs_id","=",$process->id)
                            ->where("psa_step","=",4);

        if($process->pcs_final_date > date('Y-m-d')){

            return view('approver.processes.step4')->with("process",$process);

        }else{

            return redirect()->route('processesAp.index');

        }
    }
    
    public function editStepFour(ProcessesStep4Request $request,$id)
    {
        $process = Process::find($request->id);
        $process->pcs_state = ($request->state == null) ? 0 : 1;
        $process->pcs_comments = $request->comments;
        if($process->pcs_current_step < 4){ 
            
            $process->pcs_current_step = 4; 
       
            $processStepApprover = new ProcessStepApprover();
            $processStepApprover->usr_id = \Auth::user()->id;
            $processStepApprover->pcs_id = $process->id;
            $processStepApprover->psa_step = 4;
            $processStepApprover->save();
        }
        $process->save();

        // flash('Se ha actualizado de manera exitosa!');
        return redirect()->route('alertapprover');
    }

    public function show($id)
    {
        $process = Process::find($id);

        return view('approver.processes.show')->with("process",$process);

    }
}
