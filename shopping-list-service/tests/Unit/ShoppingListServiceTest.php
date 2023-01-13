<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ShoppingList;
use App\Services\ShoppingListService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShoppingListServiceTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_creating_shoppinglist()
    {
        //Arrange 
        $shoppingListService = (new ShoppingListService());
        $shoppingList = ShoppingList::factory()->make();
        $this->assertDatabaseCount('shopping_lists', 0);


        //Act
        $shoppingListService->create($shoppingList->toArray());

        //Assert

        $this->assertDatabaseHas('shopping_lists', ['name' => $shoppingList->name])
             ->assertDatabaseCount('shopping_lists', 1);
    }

    public function test_reading_shoppinglist()
    {
        //Arrange 
        $shoppingListService = (new ShoppingListService());
        $shoppingLists = ShoppingList::factory()->count(5)->create();

        //Act
        $shoppingList = $shoppingListService->show($shoppingLists[4]->id);

        //Assert
        $this->assertEquals($shoppingLists[4]->id, $shoppingList->id);
    }

    public function test_update_shopping_list()
    {
        //Arrange 
        $shoppingListCreated = ShoppingList::factory()->create();
        $shoppingListNew = ShoppingList::factory()->make();

        $shoppingListService = (new ShoppingListService());
        $this->assertDatabaseMissing('shopping_lists', ['name' => $shoppingListNew->name]);

        //Act
        $shoppingListService->update($shoppingListCreated->id, $shoppingListNew->toArray());

        //Assert
        $this->assertDatabaseMissing('shopping_lists', ['name' => $shoppingListCreated->name])
             ->assertDatabaseHas('shopping_lists', ['name' => $shoppingListNew->name])
             ->assertDatabaseCount('shopping_lists', 1);
    }

    public function test_delete_shoppingCart()
    {
        //Arrange 
        $shoppingListCreated = ShoppingList::factory()->create();

        $shoppingListService = (new ShoppingListService());
        $this->assertDatabaseHas('shopping_lists', ['name' => $shoppingListCreated->name]);

        //Act
        $shoppingListService->delete($shoppingListCreated->id);

        //Assert
        $this->assertDatabaseCount('shopping_lists', 0)
             ->assertDatabaseMissing('shopping_lists', ['name' => $shoppingListCreated->name]);
    }
}
