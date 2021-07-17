<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User as UserEloquent;
use App\Models\Student as StudentEloquent;
use App\Models\Score as ScoreEloquent;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = UserEloquent::create([
            'name' => 'Sam',
            'email' => 'sam@nkust.edu.tw',
            'password' => bcrypt('abc123')
        ]);
        $student = StudentEloquent::create([
            'user_id' => $user->id,
            'no' => 'u0624000',
            'tel' => '0912345678'
        ]);
        $score = ScoreEloquent::create([
            'student_id' => $student->id,
            'chinese' => 60,
            'english' => 60,
            'math' => 60,
            'total' => 180
        ]);
    }
}