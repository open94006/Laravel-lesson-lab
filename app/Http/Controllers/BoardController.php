<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Score as ScoreEloquent;

class BoardController extends Controller
{
    public function show()
    {
        return View::make('board', [
            'scores' => ScoreEloquent::with('student')
                ->orderByTotal()
                ->orderBySubject()
                ->get()
        ]);
    }
}