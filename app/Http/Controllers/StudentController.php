<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Student as StudentEloquent;

class StudentController extends Controller
{
    public function getStudentData($student_no)
    {
        $student = StudentEloquent::where('no', $student_no)->firstOrFail();
        return View::make('student', [
            'student' => $student,
            'user' => $student->user,
            'score' => $student->score,
            'subject' => null
        ]);
    }


    public function getStudentScore($student_no, $subject = null)
    {
        $student = StudentEloquent::where('no', $student_no)->firstOrFail();
        return View::make('student', [
            'student' => $student,
            'user' => $student->user,
            'score' => $student->score,
            'subject' => $subject
        ]);
    }
}