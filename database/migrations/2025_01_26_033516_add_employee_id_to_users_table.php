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
        Schema::table('users', function (Blueprint $table) {
            // Add the employee_id column as a foreign key
            $table->foreignId('employee_id')
                  ->nullable() // Allow null values (optional)
                  ->constrained('employees') // Reference the employees table
                  ->onDelete('cascade'); // Cascade delete if employee is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['employee_id']);
            // Drop the employee_id column
            $table->dropColumn('employee_id');
        });
    }
};
