<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoreboards', function (Blueprint $table) {
            $table->integer('id_scoreboard')->primary();
            $table->string('home_team')->nullable()->default('Home');
            $table->string('away_team')->nullable()->default('Away');
            $table->integer('home_score')->nullable()->default(0);
            $table->integer('away_score')->nullable()->default(0);
            $table->string('audio')->nullable()->default('');
            $table->string('audio_state')->nullable()->default('stopped');
            $table->integer('timer')->nullable()->default(0);
            $table->string('timer_state')->nullable()->default('stopped');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scoreboards');
    }
}
