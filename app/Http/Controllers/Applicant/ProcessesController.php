<?php

namespace App\Http\Controllers\Applicant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Process;
use App\Department;
use App\Municipalitie;

use App\Http\Requests\ProcessesStep1Request;
use App\Http\Requests\ProcessesStep3Request;

class ProcessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {         
        if(isset($request->initial_date) && !empty($request->initial_date)){
            $date = str_replace("/", "-", $request->initial_date);
            $request->initial_date = \Carbon\Carbon::parse($date)->format('Y-m-d');
        }

        $processes = Process::search(\Auth::user()->id, $request->initial_date, $request->state)->paginate(5);

        return view('applicant.processes.index')
                ->with('processes', $processes)
                ->with('initial_date', $request->initial_date)
                ->with('state', $request->state);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::pluck('dpt_name', 'id');

        return view('applicant.processes.create')->with('departments', $departments);
    }

    public function setDateTimestampUnix($date)
    {
        $unixDate = strtotime($date) * 1000;
        return $unixDate;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProcessesStep1Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessesStep1Request $request)
    {
        $process = new Process();
        $process->pcs_description = $request->description;
        $process->pcs_state = 1;
        $process->dpt_id = $request->department;
        $process->mcp_id = $request->municipalitie;
        $process->usr_id = \Auth::user()->id;
        $process->pcs_current_step = 1;
        $number = $this::setDateTimestampUnix(date("Y-m-d H:i:s"));
        $process->save();

        $process->pcs_number = $process->id.$number;
        $process->save();

        return redirect()->route('alert');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $process = Process::find($id);
        $departments = Department::pluck('dpt_name', 'id');
        $municipalitie = Municipalitie::where('dpt_id','=',$process->dpt_id)->pluck('mcp_name', 'id');

        if($process->pcs_final_date > date('Y-m-d')){

            return view('applicant.processes.edit')->with('process', $process)
                                                    ->with('departments',$departments)
                                                    ->with('municipalitie',$municipalitie);

        }else{

            return redirect()->route('processes.index');

        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProcessesStep1Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $process = Process::find($id);
        $process->pcs_description = $request->description;
        $process->dpt_id = $request->department;
        $process->mcp_id = $request->municipalitie;
        $process->save();

        return redirect()->route('processes.step2',$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stepTwo($id)
    {
        $process = Process::find($id);
        if($process->pcs_final_date > date('Y-m-d')){

            if($process->pcs_current_step == 1){

                return redirect()->route('alert');   
            
            }else{

                return view('applicant.processes.step2')->with("process",$process);

            }

        }else{

            return redirect()->route('processes.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stepThree($id)
    {
        $process = Process::find($id);

        if($process->pcs_final_date > date('Y-m-d')){

            if($process->pcs_current_step >= 2){

               return view('applicant.processes.step3')->with("process",$process);
            
            }else{

                return redirect()->route('alert');

            }

        }else{

            return redirect()->route('processes.index');

        }
    }

    public function editStepThree(ProcessesStep3Request $request,$id)
    {
        $process = Process::find($id);
        $file_temp = $process->pcs_document;

        if($request->file('file')){
            $file = $request->file('file');    
            $name_file = 'docs_process_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/docs/processes/';
            if(!empty($file_temp)){
                unlink($path.$file_temp);  
            }            
            $file->move($path, $name_file);
            $process->pcs_document = $name_file;
        }
        if($process->pcs_current_step < 3){ $process->pcs_current_step = 3; }
        $process->save();

        // flash('Se ha actualizado de manera exitosa!');
        return redirect()->route('processes.step4',$process->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stepFour($id)
    {
        $process = Process::find($id);

        if($process->pcs_final_date > date('Y-m-d')){

            if($process->pcs_current_step >= 4){

                return view('applicant.processes.step4')->with("process",$process);
             
             }else{
 
                 return redirect()->route('alert');
 
             }


        }else{

            return redirect()->route('processes.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stepFive($id)
    {
        $process = Process::find($id);

        if($process->pcs_final_date > date('Y-m-d')){
            
            return view('applicant.processes.step5')->with("process",$process);
            
        }else{

            return redirect()->route('processes.index');

        }
    }

    public function show($id)
    {
        $process = Process::find($id);

        return view('applicant.processes.show')->with("process",$process);

    }

}
