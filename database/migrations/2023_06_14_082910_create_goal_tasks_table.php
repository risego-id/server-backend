<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('goal_id')->unsigned()->nullable();
            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('CASCADE');
            $table->string('title');
            $table->boolean('is_done');
            $table->string('task_type');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('goal_tasks');
    }
}
