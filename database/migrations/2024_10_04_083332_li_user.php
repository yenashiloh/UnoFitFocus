<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*Schema::create('li_user', function (Blueprint $table) {
            $table->bigInteger('li_user_id')->unsigned()->primary();
            $table->string('email')->unique()->index();
            $table->string('password')->index();
            $table->timestamps(); //created and updated
        });*/

        Schema::create('user_info', function (Blueprint $table) {
            $table->bigInteger('user_info_id')->primary();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id', 'fk_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->index();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birthdate')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_pic')->nullable();
            $table->timestamps(); //created and updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('li_user');
        Schema::dropIfExists('user_info');
    }
};
