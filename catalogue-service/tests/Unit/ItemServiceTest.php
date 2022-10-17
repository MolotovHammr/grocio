<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\ItemService;
use App\Models\Item;

class ItemServiceTest extends TestCase
{

    use RefreshDatabase;

    public function test_item_can_be_created()
    {
        //Arrange 
        $itemService = (new ItemService());
        $this->assertDatabaseCount('items', 0);

        $itemData = [
            'name' => 'Ham',
            'weight' => 0.5
        ];

        //Act
        $itemService->create($itemData);

        //Assert
        $this->assertDatabaseCount('items', 1)
        ->assertDatabaseHas('items', ['name' => 'Ham']);
    }

    public function test_get_all_items()
    {
        //Arrange 
        Item::factory()->count(5)->create();
        $itemService = (new ItemService());

        //Act
        $items = $itemService->index();

        //Assert
        $this->assertCount(5, $items);
    }

    public function test_get_item_by_id()
    {
        //Arrange
        $items = Item::factory()->count(5)->create();
        $itemService = (new ItemService());

        //Act
        $item = $itemService->get($items[2]->id);

        //Assert
        $this->assertEquals($items[2]->id, $item->id);
    }

    public function test_update_item_by_id()
    {
     
        //Arrange
        $itemCreated = Item::factory()->create();
        $itemService = (new ItemService());
        $this->assertDatabaseMissing('items', ['name' => 'Ham']);

        $itemData = [
            'name' => 'Ham',
            'weight' => 0.5
        ];

        //Act
        $itemService->update($itemCreated->id, $itemData);

        //Assert
        $this->assertDatabaseCount('items', 1)
        ->assertDatabaseHas('items', ['name' => 'Ham']);
    }

    public function test_delete_item()
    {

        //Arrange
        $itemCreated = Item::factory()->create();
        $itemService = (new ItemService());
        $this->assertDatabaseMissing('items', ['name' => 'Ham']);

        //Act
        $itemService->delete($itemCreated->id);

        //Arrange
        $this->assertDatabaseCount('items', 0)
        ->assertDatabaseMissing('items', ['name' => $itemCreated->name]);
    }
}
