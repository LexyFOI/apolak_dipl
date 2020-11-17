<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_name'=> $this->faker->name,
            'startDate'=> $this->faker->date(),
            'endDate'=>$this->faker->date(),
            'payment'=>$this->faker->boolean,
            'price'=>$this->faker->buildingNumber,
            'event_points'=>$this->faker->numberBetween(0,5),
            'event_description'=>$this->faker->sentence
        ];
    }
}
