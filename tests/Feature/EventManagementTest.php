<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class EventManagementTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function only_authenticated_user_can_create_an_event()
    {
        $attributes = Event::factory()->raw(['owner_id' => null]);
        $this->post('/events', $attributes)->assertSessionMissing('owner');
//uključen je na post('/event', ..EventController@store)->middleware('auth'); a on automatski preusmjerava na 'login'

    }

    /** @test */
   public function a_user_can_create_an_event()
   {
       $this->withoutMiddleware();
       $this->withoutExceptionHandling();

       $this->actingAs(User::factory()->create()); //--> prema tutorijalu
       //$attributes = Event::factory()->raw(['owner_id'=> Auth::user()->id]);

       //ako pokušam otvoriti kreiranje događaja provjerim da se to i dogodi
       $this->get('/events/create')->assertStatus(200);

       $attributes= [
           'event_name'=> $this->faker->name,
           'startDate'=> $this->faker->date(),
           'endDate'=>$this->faker->date(),
           'payment'=>$this->faker->boolean,
           'price'=>$this->faker->buildingNumber,
           'event_points'=>$this->faker->numberBetween(0,5),
           'event_description'=>$this->faker->sentence
       ];

       $attributes2 = array_replace($attributes, ["owner_id" => Auth::id()]);

       $this->post('/events', $attributes2)->assertRedirect('/events');

       $this->assertDatabaseHas('events', $attributes);

       $this->get('/events')->assertSee($attributes['event_name']);
       $this->get('/events')->assertSee($attributes['startDate']);
   }

   /** @test */
    public function a_user_can_view_an_event(){
    //pregled evenata i prikaz detalja o pojedinom mogu vidjeti i gosti stranice

        $event = Event::factory()->create();
        //$this->get('/events/'.$event->id)
            $this->get($event->path())
                ->assertSee($event->event_name)
                ->assertSee($event->startDate)
                ->assertSee($event->endDate)
                ->assertSee($event->payment)
                ->assertSee($event->price)
                ->assertSee($event->event_points)
                ->assertSee($event->event_description);
    }

   /** @test */
    public function an_event_requires_a_name(){
       //$this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $attributes = Event::factory()->raw(['event_name' => '',]);
        //$this->post('/events', [])->assertSessionHasErrors('event_name');
        $this->post('/events', $attributes)->assertSessionMissing('event_name');
    }

    /** @test */
    public function an_event_requires_a_start_date(){
        //$this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $attributes = Event::factory()->raw(['startDate' => '',]);
        $this->post('/events', $attributes)->assertSessionMissing('startDate');
    }

    /** @test */
    public function an_event_requires_a_end_date(){
        //$this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $attributes = Event::factory()->raw(['endDate' => '',]);
        $this->post('/events', $attributes)->assertSessionMissing('endDate');
    }

    /** @test */
    public function an_event_requires_a_payment(){
       // $this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $attributes = Event::factory()->raw(['payment' => '',]);
        $this->post('/events', $attributes)->assertSessionMissing('payment');
    }

    /** @test */
    public function an_event_requires_a_price(){
        //$this->withoutMiddleware();
        $attributes = Event::factory()->raw(['price' => '',]);
        $this->post('/events', $attributes)->assertSessionMissing('price');
    }
    /** @test */
    public function an_event_requires_the_points(){
        //$this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $attributes = Event::factory()->raw(['event_points' => '',]);
        $this->post('/events', $attributes)->assertSessionMissing('event_points');
    }
    /** @test */
    public function an_event_requires_an_event_description(){
       // $this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $attributes = Event::factory()->raw(['event_description' => '',]);
        $this->post('/events', $attributes)->assertSessionMissing('event_description');
    }
}
