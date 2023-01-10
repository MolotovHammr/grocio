<?php

namespace Tests\Feature;

use App\Models\Catalogue;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
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
            'energy' => 1000.0,
            'total_fat' => 500.0,
            'saturated_fat' => 30.0,
            'total_carbohydrates' => 20.0,
            'sugars' => 30.0,
            'protein' => 15.0,
            'salt' => 30.0,
            'catalogue_id' => $catalogue->id
        ];

        // Act
        $response = $this->json('POST', 'api/items', $itemPayload, ['Accept' => 'application/json']);
        //Assert
        $response->assertStatus(201)
        ->assertJsonStructure([
            "item" => [
                'name',
                'quantity',
                'unit',
                'energy',
                'total_fat',
                'saturated_fat',
                'total_carbohydrates',
                'sugars',
                'protein',
                'salt',
                'catalogue_id',
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
                'name',
                'quantity',
                'unit',
                'energy',
                'total_fat',
                'saturated_fat',
                'total_carbohydrates',
                'sugars',
                'protein',
                'salt',
                'catalogue_id',
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
        ->assertJsonCount(1)
        ->assertJsonStructure([
            'items' =>[
                "*" => [
                    'name',
                    'quantity',
                    'unit',
                    'energy',
                    'total_fat',
                    'saturated_fat',
                    'total_carbohydrates',
                    'sugars',
                    'protein',
                    'salt',
                    'catalogue_id',
                    'created_at',
                    'updated_at'
                ]
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
            'energy' => 1000.0,
            'total_fat' => 500.0,
            'saturated_fat' => 30.0,
            'total_carbohydrates' => 20.0,
            'sugars' => 30.0,
            'protein' => 15.0,
            'salt' => 30.0,
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
        ->assertDatabaseHas('items', ['name' => 'Cheese2', 'quantity' => 500.0,  'saturated_fat' => 30.0,]);
    
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
