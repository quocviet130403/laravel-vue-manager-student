<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function create(){
        $data = ['scope' => 'create'];
        return view('student.create')->with($data);
    }
}
