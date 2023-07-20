<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $first_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();
        $job_position_id = $this->faker->randomNumber(1, 10);
        return [
            'title' => $this->faker->title(),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'join_date' => Carbon::now()->addMonths(-rand(5, 12))
                ->addDays(-rand(1, 28))
                ->addYears(-rand(1, 5)),
            'status' => 1,
            'promotion_date' => Carbon::now()->addMonths(-rand(1, 3))
                ->addDays(-rand(1, 28)),
            'user_id' => User::factory()->create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $this->faker->unique()->safeEmail(),
            ])->id,
            'job_position_id' => $job_position_id
        ];
    }
}
