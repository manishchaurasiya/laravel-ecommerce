<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->float('price', 8, 2);
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('vendor_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
            $table->enum('status', ['Paid', 'Failed', 'Cancelled']);
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
        Schema::dropIfExists('payments');
    }
}
