<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('month')->nullable();
            $table->tinyInteger('meeting_attended')->nullable();
            $table->string('cp_name')->nullable();
            $table->string('cp_zone')->nullable();
            $table->string('zone_coordinator')->nullable();
            $table->integer('contacts_goal')->nullable();
            $table->integer('contacts_result')->nullable();
            $table->integer('conversions_goal')->nullable();
            $table->integer('conversions_result')->nullable();
            $table->integer('baptized_goal')->nullable();
            $table->integer('baptized_result')->nullable();
            $table->integer('leaders_goal')->nullable();
            $table->integer('leaders_result')->nullable();
            $table->integer('groups_goal')->nullable();
            $table->integer('groups_result')->nullable();
            $table->integer('participants_goal')->nullable();
            $table->integer('participants_result')->nullable();
            $table->integer('group_leaders_goal')->nullable();
            $table->integer('group_leaders_result')->nullable();
            $table->text('prayer_1')->nullable();
            $table->text('prayer_2')->nullable();
            $table->text('prayer_3')->nullable();
            $table->text('testimony')->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
