<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    public function a_user_has_events()
    {

        $user = User::factory()->create();
        $this->assertInstanceOf(Collection::class, $user->events);
    }
}
