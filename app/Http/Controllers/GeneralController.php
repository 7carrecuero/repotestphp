<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipalitie;

class GeneralController extends Controller
{
    public function get_municipalities(Request $request, $id){
        
        $municipalities = Municipalitie::where('dpt_id','=',$id)->pluck('mcp_name', 'id')->toArray();

        return response()->json($municipalities);

    }

    /**
     * Download files.
     *
     * @param  int  $file
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($file){
        $pathToFile = public_path()."\docs\processes\\".$file;
        return response()->download($pathToFile);
    }

    public function alert(){

        return view('alert');
    }

    public function alertApprover(){

        return view('alertapprover');
    }
}
