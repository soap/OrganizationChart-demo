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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('title');
            $table->string('first_name', 200)->comment('first name');
            $table->string('last_name', 200)->comment('last name');
            $table->timestamp('join_date')->comment('job start date');
            $table->timestamp('quit_date')->nullable()->comment('ex. job resigned date');
            $table->smallInteger('status')->default(1)->comment('1: active, 2: resigned, 3: terminated');
            $table->foreignId('user_id');
            $table->foreignId('job_position_id');
            $table->timestamp('promotion_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
