<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Leave;
use App\Models\Employee;

class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeThisMonth();
        $endDate = $this->faker->dateTimeBetween($startDate, '+7 days');

        return [
            'employee_id' => Employee::factory(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'type' => $this->faker->randomElement(['sick', 'annual', 'unpaid']),
            'reason' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
