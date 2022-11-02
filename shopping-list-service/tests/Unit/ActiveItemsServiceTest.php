<?php

namespace Tests\Unit;

use App\Models\ActiveItem;
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

        // dd($activeItem->id);
        $amount = $activeItem->amount + 1;

        $activeItemService = (new ActiveItemService());

        //Act 
        $activeItem = $activeItemService->increase($activeItem->id);

        //Assert
        $this->assertEquals($amount, $activeItem->amount);
    }

}
