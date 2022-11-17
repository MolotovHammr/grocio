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
            $table->integer('energy')->after('unit');
            $table->decimal('total_fat')->after('energy');
            $table->decimal('saturated_fat')->after('total_fat');
            $table->decimal('total_carbohydrates')->after('saturated_fat');
            $table->decimal('sugars')->after('total_carbohydrates');
            $table->decimal('protein')->after('sugars');
            $table->decimal('salt')->after('protein');
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
            $table->dropColumn('energy');
            $table->dropColumn('total_fat');
            $table->dropColumn('saturated_fat');
            $table->dropColumn('total_carbohydrates');
            $table->dropColumn('sugars');
            $table->dropColumn('protein');
            $table->dropColumn('salt');
        });
    }
};
