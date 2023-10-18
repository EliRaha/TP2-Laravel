<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudient;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5, true);
        return [
            'titre' => ucfirst($title),
            'titre_fr' => ucfirst($title),
            'date' => $this->faker->date,
            'user_id' => User::factory(),
        ];
 }
}
