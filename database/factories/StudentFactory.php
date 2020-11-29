<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        //$table->unsignedBigInteger('event_id');
            'oib' => $this->faker->numberBetween(00000000000,99999999999),
            'student_name' => $this->faker->firstName,
            'student_last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'course_id'=> function(){
                return User::factory()->create()->id;
            }
        ];
    }
}
