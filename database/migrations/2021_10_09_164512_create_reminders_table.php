<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('task_id')->constrained()->onDelete('cascade');
            $table->dateTimeTz('remind_at', $precision = 0)->nullable();
            $table->dateTimeTz('due_at', $precision = 0)->required();
            $table->dateTimeTz('expire_at', $precision = 0)->nullable();
            $table->dateTimeTz('completed_at', $precision = 0)->nullable();
            $table->boolean('is_reminded')->default(0);
            $table->boolean('is_sent')->default(0);
            $table->boolean('is_complete')->default(0);
            $table->boolean('is_expired')->default(0);
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
        Schema::dropIfExists('reminders');
    }
}
