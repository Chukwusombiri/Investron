<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'duration'=>$this->faker->numberBetween(12,36),
            'min'=>$this->faker->numberBetween(50,1000000),
            'max'=>$this->faker->numberBetween(50,1000000),
            'perMonInt'=>$this->faker->numberBetween(5,100),
            'features'=> json_encode([
                '$0 commission stock trading',
                '0.5% management fees on managed investment account',
                '4% interest on your cash account balance',
                'Options trading at $2/contract',
                '2% crypto trading fee',
                'customer support from a real human',
                'Maximum tax refund guaranteed',
            ]),
        ];
    }
}
