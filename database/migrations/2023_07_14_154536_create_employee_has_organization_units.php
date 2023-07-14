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
        Schema::create('employee_has_organization_units', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('organization_unit_id');
            $table->timestamp('start_date');
            $table->unsignedBigInteger('job_role_id');

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('organization_unit_id')->references('id')->on('organization_units');
            
            $table->primary(['employee_id', 'organization_unit_id']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_organization_unit');
    }
};
