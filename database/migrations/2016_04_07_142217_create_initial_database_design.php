<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialDatabaseDesign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('label');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('funding_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('label');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('project_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('label');
            $table->string('description');
            $table->smallInteger('record_status_id')->references('id')->on('record_statuses');
            $table->timestamps();
        });

        Schema::create('project_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('label');
            $table->string('description');
            $table->smallInteger('record_status_id')->references('id')->on('record_statuses');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('user_id')->references('id')->on('users');
            $table->string('project_category_id')->references('id')->on('project_categories');
            $table->text('description');
            $table->bigInteger('amount');
            $table->smallInteger('project_status_id')->references('id')->on('project_statuses');
            $table->smallInteger('funding_status_id')->references('id')->on('funding_statuses');
            $table->timestamps();
        });

        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('label');
            $table->string('description');
            $table->smallInteger('record_status_id')->references('id')->on('record_statuses');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->references('id')->on('users');
            $table->string('project_id')->references('id')->on('projects');
            $table->bigInteger('amount');
            $table->smallInteger('payment_status_id')->references('id')->on('payment_statuses');
            $table->timestamps();
        });

        Schema::create('rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->references('id')->on('users');
            $table->string('project_id')->references('id')->on('projects');
            $table->string('label');
            $table->string('description');
            $table->bigInteger('amount');
            $table->bigInteger('reward_limit');
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
        Schema::drop('record_statuses');
        Schema::drop('funding_statuses');
        Schema::drop('funds');
        Schema::drop('payment_statuses');
        Schema::drop('payments');
    }
}
