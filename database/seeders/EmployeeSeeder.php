<?php
namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::factory()->count(20)->create();
    }
}