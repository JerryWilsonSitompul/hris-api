<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $checkIn = $this->faker->dateTimeThisMonth();
        $checkOut = $this->faker->optional()->dateTimeBetween($checkIn, '+8 hours');

        return [
            'employee_id' => Employee::factory(),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'check_in_location' => $this->faker->address,
            'check_out_location' => $checkOut ? $this->faker->address : null,
            'check_in_photo' => $this->faker->imageUrl(),
            'check_out_photo' => $checkOut ? $this->faker->imageUrl() : null,
        ];
    }
}
