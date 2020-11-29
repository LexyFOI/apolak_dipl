<?php

namespace Tests\Unit;

use App\Models\Event;
use App\Models\PaymentEvidence;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;
   /** @test  */
    public function it_has_a_path()
    {
        $event = Event::factory()->create();

        $this->assertEquals('/events/'.$event->id, $event->path());
    }

    /** @test  */
    public function it_can_add_a_payment_evidence()
    {
        ///$this->withoutExceptionHandling();
        $event = Event::factory()->create();
        $payment = $event->addStudent('1');

        $this->assertCount(1,$event->payments);
        $this->assertTrue($event->payments->contains($payment));
        $this->assertEquals(0, PaymentEvidence::first()->paid);
        $this->assertEquals($event->id, PaymentEvidence::first()->event_id);

    }
}
