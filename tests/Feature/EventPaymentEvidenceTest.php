<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\PaymentEvidence;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventPaymentEvidenceTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function an_event_can_have_payment_evidence()
    {
        //$this-> withoutExceptionHandling();
       // $this-> withoutMiddleware();

        $this->signIn();

        //$event = Event::factory()->create(['owner_id' => auth()->id()]);
        $event = auth()->user()->events()->create(Event::factory()->raw());
       // $student = Student::factory()->create();
        $this->post($event->path().'/payments', ['student_id' => 1]);
       // $this->post($event->path().'payments', [$event, $student]);

        $this->get($event->path())
            ->assertSee('1');

    }

     /** @test */
    public function a_payment_can_be_updated(){
       $this->withoutExceptionHandling();
       $this->withoutMiddleware();
        $this->signIn();
        $event = auth()->user()->events()->create(Event::factory()->raw());

        $payment = $event->addStudent('1');
        $this->patch($event->path() . '/payments/' . $payment->id,[
            'paid'=> true,
        ]);

        $this->assertDatabaseHas('payment_evidence',[
            'paid' => true,
        ]);
    }

    /** @test  */
    public function an_payment_evidence_requires_an_event_id(){
        $this->signIn();

        $event = auth()->user()->events()->create(
            Event::factory()->raw()
        );

        $attributes = PaymentEvidence::factory()->raw(['event_id' => '']);
        $this->post($event->path().'payments', $attributes)->assertSessionMissing('event_id');
    }

    /** @test  */
    public function an_payment_evidence_requires_a_student_id(){
        $this->signIn();

        $event = auth()->user()->events()->create(
            Event::factory()->raw()
        );

        $attributes = PaymentEvidence::factory()->raw(['student_id' => '']);
        $this->post($event->path().'payments', $attributes)->assertSessionMissing('student_id');
    }
}
