<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use App\Models\Ville;
//on a appeler Ville ici parceque on a ville_id pour utuliser la class Ville

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //on a creer  des attribute correct pour chaque faker base on our table
            //rechercher des proprietes"Factory"
            'nom' => $this->faker->name,
            'adresse' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date_de_naissance' => $this->faker->dateTimeBetween('-65 years', '-14 years')->format('Y-m-d'),
            'ville_id' => Ville::all()->random()->id,
            //'ville_id' => Ville::factory(),




            

        ];
    }
}
