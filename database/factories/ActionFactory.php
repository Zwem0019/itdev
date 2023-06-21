<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Issue' => fake()->text(),
            'Action' => fake()->text(),
            'Reference_nr' => fake()->numberBetween(),
            'Date_Raised' =>fake()->date(),
            'Responsible' => fake()->text(),
            'Target_Date_Datum' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'Status'=> fake()-> text(),
            'Comp_Date' => fake()->date(),
            //
        ];
    }
}
