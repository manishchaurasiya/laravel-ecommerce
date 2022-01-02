<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_no')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('profile_pic')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->foreignId('role_id')->constrained('roles');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
