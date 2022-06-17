<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $name = $faker->sentence;
        $slug = Str::slug($name);
        $start_at = $faker->dateTimeBetween('today', 'next Monday +7 days');
        $end_at = $faker->dateTimeBetween($start_at->format('Y-m-d H:i:s').' +1 days', $start_at->format('Y-m-d H:i:s').' +5 days');
        return [
            'name' => $name,
            'slug' => $slug,
            'start_at' => $start_at,
            'end_at' => $end_at,
        ];
    }
}
