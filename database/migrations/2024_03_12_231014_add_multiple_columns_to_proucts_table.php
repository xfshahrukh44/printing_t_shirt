<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsToProuctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasTable('products') && !Schema::hasColumn('products', 'price2') && !Schema::hasColumn('products', 'price3') && !Schema::hasColumn('products', 'price4') && !Schema::hasColumn('products', 'size') && !Schema::hasColumn('products', 'in_stock')) {
                $table->decimal('price2', 10, 2)->default(0);
                $table->decimal('price3', 10, 2)->default(0);
                $table->decimal('price4', 10, 2)->default(0);
                $table->string('size')->nullable();
                $table->integer('in_stock')->default(1);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasTable('products') && Schema::hasColumn('products', 'price2') && Schema::hasColumn('products', 'price3') && Schema::hasColumn('products', 'price4') && Schema::hasColumn('products', 'in_stock')) {
                $table->dropColumn('price2');
                $table->dropColumn('price3');
                $table->dropColumn('price4');
                $table->dropColumn('size');
                $table->dropColumn('in_stock');
            }
        });
    }
}
