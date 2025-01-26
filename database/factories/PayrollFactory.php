<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Payroll;
use App\Models\Employee;

class PayrollFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payroll::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $basicSalary = $this->faker->randomFloat(2, 3000, 10000); // 2 decimal places
        $allowances = $this->faker->randomFloat(2, 500, 2000);   // 2 decimal places
        $deductions = $this->faker->randomFloat(2, 100, 1000);   // 2 decimal places
        $netSalary = $basicSalary + $allowances - $deductions;

        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'basic_salary' => $basicSalary,
            'allowances' => $allowances,
            'deductions' => $deductions,
            'net_salary' => $netSalary,
            'payroll_date' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
