<?php

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
        Schema::table('items', function (Blueprint $table) {
            
            $table->renameColumn('weight', 'quantity');
        });
        Schema::table('items', function (Blueprint $table) {
            
            $table->string('unit')->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {

            $table->dropColumn('unit');
            $table->renameColumn('quantity', 'weight');
        });
    }
};
