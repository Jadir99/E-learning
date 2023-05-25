<?php

namespace Tests\Feature;

use App\Models\categorie;
use App\Models\course;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Illuminate\Session\Store;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    // use RefreshDatabase;

    /**
     * Test the store method of CourseController.
     */
//     public function testStore()
// {
//     Store::fake('public'); // Use a fake storage disk for testing

//     $file = HttpUploadedFile::fake()->image('course_image.jpg');

//     $data = [
//         'title' => 'Test Course',
//         'category' => 1, // Replace with a valid category ID
//         'image' => $file,
//         'description' => 'This is a test course.',
//     ];

//     $response = $this->post(route('courses.store'), $data);

//     $response->assertStatus(302); // Adjust the expected status code if needed

//     // Perform additional assertions or checks if necessary
// }


//     /**
//      * Test the update method of CourseController.
//      */
//     public function testUpdate()
//     {
//         // Create a course
//         $course = Course::factory()->create();

//         // Create a category
//         $category = categorie::factory()->create();

//         // Make a PUT request to the update route with the updated course data
//         $response = $this->put(route('courses.update', $course->id), [
//             'title' => 'Updated Course',
//             'category' => $category->id,
//             'image' => 'updated.jpg',
//             'description' => 'This is an updated course.',
//         ]);

//         // Assert that the course was updated successfully
//         $response->assertRedirect(route('courses.show', $course->id));
//         $this->assertDatabaseHas('courses', [
//             'id' => $course->id,
//             'title' => 'Updated Course',
//             'category_id' => $category->id,
//             'image' => 'updated.jpg',
//             'description' => 'This is an updated course.',
//         ]);
//     }

    /**
     * Test the destroy method of CourseController.
     */
    public function testDestroy()
    {
        // Create a course
        $course = course::factory()->create();

        // Make a DELETE request to the destroy route
        $response = $this->delete(route('courses.destroy', $course->id));

        // Assert that the course was deleted successfully
        $response->assertRedirect(route('courses.index'));
        $this->assertDatabaseMissing('courses', ['id' => $course->id]);
    }
}
