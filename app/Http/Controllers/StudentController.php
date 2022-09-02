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
    
    public function getData($searchQuery = null){
        if($searchQuery){
            return Student::where('name','like','%'.$searchQuery.'%')->get();
        }else{
            return Student::all();
        }
    }

    public function edit($id){
        $data = ['scope' => 'edit'];
        return view('student.create',compact('id'))->with($data);
    }

    public function getDataById($id){
        $student = Student::find($id);
        return response()->json([
            'errorCode' => 200,
            'data' => $student
        ]);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $data = Arr::except($request->all(),['_token','_method']);
        $checkUpdate = $student->update($data);
        if(!$checkUpdate){
            return response()->json([
                'errorCode' => 500,
                'msgCode' => 'Update Error'
            ]);
        }
        return response()->json([
            'errorCode' => 200,
            'msgCode' => 'Update Success'
        ]);
    }

    public function delete($id){
        $student = Student::find($id);
        if($student){
            $student->delete();
            return response()->json([
                'errorCode' => 200,
                'msgCode' => 'Delete Success'
            ]);
        }
        return response()->json([
            'errorCode' => 500,
            'msgCode' => 'Delete Error'
        ]);
    }
}
