<?php

use App\Models\Item;
use App\Models\ShoppingList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_items', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Item::class);
            $table->foreignIdFor(ShoppingList::class);

            $table->timestamp('added_at')->nullable();
            $table->timestamp('bought_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_items');
    }
};
