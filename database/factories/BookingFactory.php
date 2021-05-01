<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'property_id' => $this->faker->name(),
                'from' => $this->faker->unique()->safeEmail(),
                'to' => now(),
                'user_id' => 1,
            ];

    }
}
