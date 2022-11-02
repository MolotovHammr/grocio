<?php

namespace Tests\Feature;

use App\Models\Catalogue;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{

    use RefreshDatabase;

    public function test_creating_an_item()
    {
        //Arrange
        $catalogue = Catalogue::factory()->create();

        $itemPayload = [
            "name" => "Cheese",
            'quantity' => 500.0,
            'unit' => 'g',
            'catalogue_id' => $catalogue->id
        ];

        // Act
        $response = $this->json('POST', 'api/items', $itemPayload, ['Accept' => 'application/json']);
        
      
        //Assert
        $response->assertStatus(201)
        ->assertJsonStructure([
            "item" => [
                'id',
                'name',
                'quantity',
                'unit',
                'created_at',
                'updated_at'
            ],
            "message"
        ]);

        $this
        ->assertDatabaseCount('items',1)
        ->assertDatabaseHas('items', ['name' => 'Cheese']);
    }

    public function test_get_item_by_id()
    {
        //Arrange
        $item = Item::factory()->create();

        //Act
        $response = $this->json('GET', 'api/items/' . $item->id);
        
        $response->assertStatus(200)
        ->assertJsonStructure([
            "item" => [
                'id',
                'name',
                'quantity',
                'unit',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    public function test_get_all_items()
    {
        //Arrange
        $items = Item::factory()->count(3)->create();

        //Act
        $response = $this->json('GET', 'api/items/');

        //Assert
        $response
        ->assertStatus(200)
        ->assertJsonCount(3)
        ->assertJsonStructure([
            "*" => [
                'id',
                'name',
                'quantity',
                'unit',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    public function test_update_an_item()
    {
        //Arrange
        $item = Item::factory()->create();

        $itemPayload = [
            "name" => "Cheese2",
            'quantity' => 500.0,
            'unit' => 'g',
        ];

        //Act
        $response = $this->json('PUT', "api/items/$item->id", $itemPayload);

        //Assert
        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            "message"
        ])
        ->assertJsonFragment(['message' => 'item succesfully updated']);

        $this
        ->assertDatabaseCount('items',1)
        ->assertDatabaseHas('items', ['name' => 'Cheese2']);
    
    }

    public function test_delete_an_item()
    {
        //Arrange
        $item = Item::factory()->create();

        //Act
        $response = $this->json('DELETE', "api/items/$item->id");

        //Assert
        $response
        ->assertStatus(200)
        ->assertJsonStructure([
            "message"
        ])
        ->assertJsonFragment(['message' => 'item succesfully deleted']);
    }
}
