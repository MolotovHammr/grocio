<?php

namespace Tests\Unit;

use App\Models\Catalogue;
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
        $catalogue_id = Catalogue::factory()->create()->id;
        $this->assertDatabaseCount('items', 0);

        $itemData = [
            'name' => 'Cheese2',
            'quantity' => 500.0,
            'unit' => 'g',
            'energy' => 1000.0,
            'total_fat' => 500.0,
            'saturated_fat' => 30.0,
            'total_carbohydrates' => 20.0,
            'sugars' => 30.0,
            'protein' => 15.0,
            'salt' => 30.0,
            'catalogue_id' => $catalogue_id,
        ];

        //Act
        $itemService->create($itemData);

        //Assert
        $this->assertDatabaseCount('items', 1)
        ->assertDatabaseHas('items', ['name' => 'Cheese2', 'energy' => 1000.0, 'sugars' => 30.0]);
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
        $item = $itemService->show($items[2]->id);

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
