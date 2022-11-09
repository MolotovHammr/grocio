<?php

namespace Tests\Unit;

use App\Models\ActiveItem;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Item;
use App\Models\ShoppingList;
use App\Services\ActiveItemService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActiveItemsServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_adding_item_to_shopping_list()
    {
        //Arrange
        $shoppingList = ShoppingList::factory()->create();
        $item = Item::factory()->create();

        $arr = ['shopping_list_id' => $shoppingList->id, 'item_id' => $item->id, 'amount' => 2];

        $activeItemService = (new ActiveItemService());

        //Act 
        $activeItem = $activeItemService->create($arr);

        //Assert
        $this->assertEquals($shoppingList->id, $activeItem->shoppingList->id);
        $this->assertEquals($item->id, $activeItem->item->id);
        $this->assertDatabaseCount('active_items', 1);   
    }

    public function test_increasing_amount_of_item_in_shopping_list()
    {
        //Arrange
        $activeItem = ActiveItem::factory()->create();
        $activeItemService = (new ActiveItemService());

        // dd($activeItem->id);
        $amount = $activeItem->amount + 1;

        //Act 
        $activeItem = $activeItemService->increase($activeItem->id);

        //Assert
        $this->assertEquals($amount, $activeItem->amount);
        $this->assertDatabaseHas('active_items', ['amount' => $amount])
        ->assertDatabaseCount('active_items', 1);
    }

    public function test_decreasing_amount_of_item_in_shopping_list()
    {
        //Arrange
        $activeItem = ActiveItem::factory()->create();
        $activeItemService = (new ActiveItemService());

        $amount = $activeItem->amount - 1;

        //Act 
        $activeItem = $activeItemService->decrease($activeItem->id);

        //Assert
        $this->assertEquals($amount, $activeItem->amount);
        $this->assertDatabaseHas('active_items', ['amount' => $amount])
        ->assertDatabaseCount('active_items', 1);
    }

    public function test_decreasing_amount_of_item_to_zero_removes_item()
    {
        //Arrange
        $activeItem = ActiveItem::factory()->create();
        $activeItem->amount = 1;
        $activeItem->save();

        $activeItemService = (new ActiveItemService());

        //Act 
        $activeItem = $activeItemService->decrease($activeItem->id);

        //Assert 
        $this->assertDatabaseCount('active_items', 0);
    }

    public function test_remove_item_from_shopping_list()
    {
        //Arrange
        $activeItem = ActiveItem::factory()->create();
        $activeItemService = (new ActiveItemService());

        //Act 
        $activeItemService->remove($activeItem->id);

        //Assert
        $this->assertDatabaseCount('active_items', 0);
    }
}
