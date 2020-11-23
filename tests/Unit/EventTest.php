<?php

namespace Tests\Unit;

use App\Models\Event;
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
}
