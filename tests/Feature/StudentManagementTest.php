<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentManagementTest extends TestCase
{
    use RefreshDatabase;

    //CRUD testing
    /** @test */ //create
    public function a_student_can_be_created()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $response = $this->post('/students',[
            'oib' => '38120594636',
            'student_name' => 'Aleksandra',
            'student_last_name' => 'Polak Tomić',
            'email'=> 'apolak@foi.hr',
            'course_id' => '3',
        ]);

        $response -> assertOk();
        $this -> assertCount(1, Student::all());

    }

    //read
    //update
    //delete

}

