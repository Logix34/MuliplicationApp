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
            $table->tinyInteger('status')->default(1);
            $table->integer('parent_id')->nullable();
            $table->string('given_name')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('children')->nullable();
            $table->string('age')->nullable();
            $table->string('area_name')->nullable();
            $table->text('area_address')->nullable();
            $table->string('area_city')->nullable();
            $table->string('area_state')->nullable();
            $table->string('area_country')->nullable();
            $table->string('mc_name')->nullable();
            $table->string('mc_pastor_name')->nullable();
            $table->string('mc_mentor_name')->nullable();
            $table->string('mc_phone')->nullable();
            $table->string('mc_email')->nullable();
            $table->text('mc_address')->nullable();
            $table->text('mc_neighbourhood')->nullable();
            $table->string('mc_city')->nullable();
            $table->string('mc_state')->nullable();
            $table->string('mc_country')->nullable();
            $table->text('testimony_1')->nullable();
            $table->text('testimony_2')->nullable();
            $table->text('testimony_3')->nullable();
            $table->text('prayer_1')->nullable();
            $table->text('prayer_2')->nullable();
            $table->text('prayer_3')->nullable();
            $table->text('cp_signature')->nullable();
            $table->text('mentor_signature')->nullable();
            $table->foreignId('project_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        \App\Models\User::create(['name'=> 'Super Admin', 'email' => 'admin@admin.com', 'password' => \Illuminate\Support\Facades\Hash::make('password')]);
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
