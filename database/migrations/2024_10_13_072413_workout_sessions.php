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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
                    $table->string('exercise')->index();
                    $table->string('difficulty')->index();
                    $table->tinyInteger('score')->index();
                    $table->date('date_performed');
                    $table->time('start_time');
                    $table->time('end_time');
                    $table->timestamps(); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_sessions');
        Schema::table('workout_sessions', function (Blueprint $table) {
            $table->dropForeign('fk_ws_uid');
        });
    }
};
