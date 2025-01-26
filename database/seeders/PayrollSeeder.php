<?php
namespace Database\Seeders;

use App\Models\Payroll;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    public function run()
    {
        // Ensure at least 20 employees exist
        // \App\Models\Employee::factory()->count(20)->create();

        // Now create payroll records
        Payroll::factory()->count(20)->create();
    }
}