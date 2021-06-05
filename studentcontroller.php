<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\student;
class studentcontroller extends Controller
{
    public function create()
    {
        $data= state::where('status','active')->pluck('id','statename');
        return view('studentform', ['states'=>$data]);
      
    }
    public function index()
    {
        return view('stateform');
    }
    public function store(Request $req)
    {
        $student = new student;
        $student->studname= $req->studname;
        $student->mobnum=$req->mobnum;
        $student->status-$req->status;
        $student->save();
    }
    public function show()
    {
        return DB::table('students')
    ->join('states','states.id','=','students.states_id')
    ->select('students.*','states.statename')->where('student.status','active');
    }
}

