<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    //
    public function create(){
        $data = ['scope' => 'create'];
        return view('student.create')->with($data);
    }
    
    public function store(Request $request){
        $data = Arr::except($request->all(),'_token');
        $student = Student::create($data);
        if(!$student){
            return response()->json([
                'errorCode' => 500,
                'msgCode' => 'Add Error'
            ]);
        }
        return response()->json([
            'errorCode' => 200,
            'msgCode' => 'Add Success'
        ]);
    }

    public function index(){
        return view('student.index');
    }
    
    public function getData(){
        return Student::all();
    }
}
