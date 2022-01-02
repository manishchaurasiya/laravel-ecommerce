<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->float('price', 8, 2);
            $table->foreignId('vendor_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('color_id')->constrained('colors');
            $table->foreignId('brand_id')->constrained('brands');
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
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
        Schema::dropIfExists('products');
    }
}
