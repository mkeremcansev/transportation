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
            $table->string('surname');
            $table->string('company')->nullable();
            $table->string('phone')->unique();
            $table->unsignedBigInteger('tax_city')->nullable();
            $table->foreign('tax_city')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('tax_province')->nullable();
            $table->foreign('tax_province')->references('id')->on('cities')->onDelete('cascade');
            $table->string('tax_no')->nullable();
            $table->longText('adress')->nullable();
            $table->string('profile_path');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('hash');
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
