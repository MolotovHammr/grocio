<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{

    use RefreshDatabase;

    public function test_creating_an_item()
    {
        $itemPayload = [
            "name" => "Cheese",
            "weight" => 500.00
        ];

        $this->json('POST', 'api/items', $itemPayload, ['Accept' => 'application/json'])
        ->assertStatus(201)
        ->assertJsonStructure([
            "item" => [
                'id',
                'name',
                'weight',
                'created_at',
                'updated_at'
            ],
            "message"
        ]);
    }

    public function test_get_all_items()
    {
        $items = Item::factory()->count(3)->create();

        $response = $this->get('api/items/');
        $response
        ->assertStatus(200)
        ->assertJsonCount(3);
    }



    public function test_update_an_item()
    {
        $item = Item::factory()->create();

        $itemPayload = [
            "name" => "Cheese2",
            "weight" => 500.00,
        ];

        $this->json('PUT', "api/items/$item->id", $itemPayload)
        ->assertStatus(200)
        ->assertJsonStructure([
            "message"
        ]);
    
    }

    public function test_delete_an_item()
    {
        $item = Item::factory()->create();

        $this->json('DELETE', "api/items/$item->id")
        ->assertStatus(200)
        ->assertJsonStructure([
            "message"
        ])->assertSee('deleted');
    }
}
