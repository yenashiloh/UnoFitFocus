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
        Schema::create('workout_sessions', function (Blueprint $table) {
            $table->bigIncrements('session_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id', 'fk_ws_userId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->index();
            $table->string('exercise')->index();
            $table->string('difficulty')->index();
            $table->tinyInteger('score')->index();
            $table->date('date_performed');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps(); //created and updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_sessions');
        Schema::table('workout_sessions', function (Blueprint $table) {
            // Drop the foreign key constraint in the down method
            $table->dropForeign('fk_ws_uid');
        });
    }
};
