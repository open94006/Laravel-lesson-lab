<?php

namespace Database\Factories;

use App\Models\Score;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Score::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory()->create()->id,
            'chinese' => $this->faker->numberBetween(0, 100),
            'english' => $this->faker->numberBetween(0, 100),
            'math' => $this->faker->numberBetween(0, 100),
            'total' => 0
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}