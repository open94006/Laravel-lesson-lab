<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student as StudentEloquent;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\Auth;


class SchoolController extends Controller
{
    public function edit($student_no)
    {
        $student = StudentEloquent::where('no', $student_no)->firstOrFail();
        return View::make('edit', compact('student'));
    }

    public function edit_self()
    {
        $user = Auth::user();
        $student = StudentEloquent::where('students.user_id', Auth::user()->id)->firstOrFail();
        return View::make('edit', compact('student'));
    }


    public function update($student_no, EditRequest $request)
    {

        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'name' => 'required|string',
        //         'tel' => 'required|string'
        //     ],
        //     [
        //         'required' => '不可為空白',
        //         'string' => '須為字串'
        //     ]
        // );

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator);
        // } else {
        //     $student = StudentEloquent::where('no', $student_no)->firstOrFail();
        //     $student->tel = $request->tel;
        //     $student->user->name = $request->name;
        //     $student->user->save();
        //     $student->save();

        //     return View::make('edit', [
        //         'student' => $student,
        //         'msg' => '修改成功'
        //     ]);
        // }

        $student = StudentEloquent::where('no', $student_no)->firstOrFail();
        $student->tel = $request->tel;
        $student->user->name = $request->name;
        $student->user->save();
        $student->save();

        return View::make('edit', [
            'student' => $student,
            'msg' => '修改成功'
        ]);
    }
}