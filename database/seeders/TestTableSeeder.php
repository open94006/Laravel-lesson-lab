<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;
use App\Models\Score as ScoreEloquent;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Score::factory()
            ->count(45)
            ->create()
            ->each(function ($score) {
                $score->total = $score->chinese + $score->english + $score->math;
                $score->save();
            });
    }
}