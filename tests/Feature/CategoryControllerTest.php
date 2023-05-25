<?php

namespace Tests\Feature;

use App\Models\categorie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
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
     * Test the index method of CategoryController.
     */
    

    /**
     * Test the store method of CategoryController.
     */
    public function testStore()
    {
        // Make a POST request to the store route with the category data
        $response = $this->post('/categories', [
            'category' => 'Test Category',
        ]);

        // Assert that the category is stored in the database
        $this->assertDatabaseHas('categories', [
            'Nom_categorie' => 'Test Category',
        ]);

        // Assert that the user is redirected back
        $response->assertRedirect();

    }
    public function testUpdate()
    {
        // Create a dummy category
        $category = categorie::factory()->create();

        // Send a PUT request to update the category
        $response = $this->put("/categories/{$category->id}", [
            'category' => 'Updated Category',
        ]);

        // Assert the response status code
        $response->assertStatus(302);

        // Assert that the category is updated in the database
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'Nom_categorie' => 'Updated Category',
        ]);
    }
    public function testDestroy()
    {
        // Create a dummy category
        $category = categorie::factory()->create();

        // Send a DELETE request to destroy the category
        $response = $this->delete("/categories/{$category->id}");

        // Assert the response status code
        $response->assertStatus(302);

        // Assert that the category is deleted from the database
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }


    /**
     * Test the show method of CategoryController.
     */
    
}
