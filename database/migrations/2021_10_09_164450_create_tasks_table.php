<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('category')->nullable();
            $table->string('label')->nullable();
            $table->text('description')->nullable();
            $table->string('check')->default('daily');
            $table->json('schedule')->nullable();
            $table->dateTimeTz('start_at', $precision = 0)->nullable();
            $table->dateTimeTz('end_at', $precision = 0)->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_automatic')->default(1);
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
        Schema::dropIfExists('tasks');
    }
}
