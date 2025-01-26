<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'department_id' => Department::factory(),
            'position_id' => Position::factory(),
            'nik' => function () {
                return mt_rand(1000000000, 9999999999); // 10-digit unique number
            },
            'join_date' => $this->faker->date(),
            'photo_path' => $this->faker->imageUrl(),
        ];
    }
}
