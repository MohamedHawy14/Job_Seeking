<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'titleAr' => fake()->sentence(3),
        'titleEn' => fake()->sentence(3),
        'tags' => fake()->words(3, true),
        'company' => fake()->company(),
        'location' => fake()->city(),
        'email' => fake()->companyEmail(),
        'website' => fake()->url(),
        'descriptionAr' => fake()->paragraph(5),
        'descriptionEn' => fake()->paragraph(5),
        'logo' => null,
    ];
    }
}
