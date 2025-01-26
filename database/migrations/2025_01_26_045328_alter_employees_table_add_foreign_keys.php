<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('employees', function (Blueprint $table) {
        // Add foreign key for department_id
        $table->foreignId('department_id')
              ->constrained('departments')
              ->onDelete('cascade');

        // Add foreign key for position_id
        $table->foreignId('position_id')
              ->constrained('positions')
              ->onDelete('cascade');
    });
}

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['department_id']);
            $table->dropForeign(['position_id']);
        });
    }
};
