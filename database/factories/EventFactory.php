<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
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
        $thisYear = date("Y");
        $year = rand($thisYear, $thisYear+1);
        $month = rand(1,12);
        $day = rand(1,28);
        $startDate = Carbon::create($year, $month, $day);

        return [
            'event_name'=> $this->faker->name,
            'startDate'=> $startDate->format('Y-m-d'),
            'endDate'=> $startDate->addDays(rand(1,5))->format('Y-m-d'),
            'payment'=>$this->faker->boolean,
            'price'=>$this->faker->buildingNumber,
            'event_points'=>$this->faker->numberBetween(0,5),
            'event_description'=>$this->faker->sentence,

            'owner_id' => function(){
                return User::factory()->create()->id;
            }
        ];
    }
}
