<?php

namespace Tests\Unit;

use App\Models\course;
use Tests\TestCase;


class CourseTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }


    public function testShow()
    {
        // Write your test logic for the 'show' method here
    }

    public function testIndex()
    {
        // Create some dummy courses
        $courses =course::factory()->count(5)->create();

        // Send a GET request to the index route
        $response = $this->get('/courses');

        $response->assertViewIs('/courses.index');

        // Assert that the view has the correct variables
        $response->assertViewHas('courses', $courses); // Replace 'Document Title' with the actual title of a document
    }

    public function testStore()
    {
        // Write your test logic for the 'store' method here
    }
}
