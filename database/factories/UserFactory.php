<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'full_name' => fake()->name(),
            'username' => fake()->userName(),
            'phone_no' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['male', 'female']),
            'status' => fake()->randomElement(['active', 'suspended']),
            'profile_type' => fake()->randomElement(['public', 'private']),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'verified_by' => Uuid::uuid4()->toString(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
