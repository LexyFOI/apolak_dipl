<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventManagementTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
   public function a_user_can_create_an_event()
   {
       $this->withoutMiddleware();
       $this->withoutExceptionHandling();

       $attributes= [
           'event_name'=> $this->faker->name,
           'startDate'=> $this->faker->date(),
           'endDate'=>$this->faker->date(),
           'payment'=>$this->faker->boolean,
           'price'=>$this->faker->buildingNumber,
           'event_points'=>$this->faker->numberBetween(0,5),
           'event_description'=>$this->faker->sentence
       ];

       $this->post('/events', $attributes)->assertRedirect('/events');

       $this->assertDatabaseHas('events', $attributes);

       $this->get('/events')->assertSee($attributes['event_name']);
   }

   /** @test */
    public function an_event_requires_a_name(){
        $this->withoutMiddleware();
        $attributes = Event::factory()->raw(['event_name' => '',]);
        //$this->post('/events', [])->assertSessionHasErrors('event_name');
        $this->post('/events', $attributes)->assertSessionHasErrors('event_name');
    }

    /** @test */
    public function an_event_requires_a_start_date(){
        $this->withoutMiddleware();
        $attributes = Event::factory()->raw(['startDate' => '',]);
        $this->post('/events', $attributes)->assertSessionHasErrors('startDate');
    }

    /** @test */
    public function an_event_requires_a_end_date(){
        $this->withoutMiddleware();
        $attributes = Event::factory()->raw(['endDate' => '',]);
        $this->post('/events', $attributes)->assertSessionHasErrors('endDate');
    }

    /** @test */
    public function an_event_requires_a_payment(){
        $this->withoutMiddleware();
        $attributes = Event::factory()->raw(['payment' => '',]);
        $this->post('/events', $attributes)->assertSessionHasErrors('payment');
    }

    /** @test */
    public function an_event_requires_a_price(){
        $this->withoutMiddleware();
        $attributes = Event::factory()->raw(['price' => '',]);
        $this->post('/events', $attributes)->assertSessionHasErrors('price');
    }
    /** @test */
    public function an_event_requires_the_points(){
        $this->withoutMiddleware();
        $attributes = Event::factory()->raw(['event_points' => '',]);
        $this->post('/events', $attributes)->assertSessionHasErrors('event_points');
    }
    /** @test */
    public function an_event_requires_an_event_description(){
        $this->withoutMiddleware();
        $attributes = Event::factory()->raw(['event_description' => '',]);
        $this->post('/events', $attributes)->assertSessionHasErrors('event_description');
    }
}
