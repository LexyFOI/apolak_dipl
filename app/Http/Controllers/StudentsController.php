<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function store()
    {
        //validate
        //persist
        Student::create([
            'oib' => request('oib'),
            'student_name' => request('student_name'),
            'student_last_name' => request('student_last_name'),
            'email'=> request('email'),
            'course_id' => request('course_id'),
        ]);
        //redirect

    }
}
