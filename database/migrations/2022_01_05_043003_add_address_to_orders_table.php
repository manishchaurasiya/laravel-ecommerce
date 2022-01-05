<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
           $table->string('name')->after('status');
           $table->string('email')->after('name');
           $table->integer('mobile_no')->after('email');
           $table->string('address')->after('mobile_no');
           $table->integer('zip_code')->after('address');
           $table->string('city')->after('zip_code');
           $table->string('state')->after('city');
           $table->string('country')->after('state');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('mobile_no');
            $table->dropColumn('address');
            $table->dropColumn('zip_code');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('country');
        });
    }
}
