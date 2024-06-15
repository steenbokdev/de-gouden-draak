<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dishNames = [
            'Soep Ling Fa',
            'Kippensoep',
            'Tomatensoep',
            'Haaienvinnensoep',
            'Kippensoep met champignons',
            'Kippensoep met bamboescheuten',
            'Loempia Ling Fa',
            'Mini loempia\'s',
            'Gefrituurde garnalen',
            'Gefrituurde inktvisringen',
            'Garnalen',
            'Gebakken garnalen',
            'Gebakken garnalen met zoetzure saus',
            'Saté',
            'Saté met pindasaus',
            'Saté met pikante saus',
            'Kroepoek',
            'Witte rijst',
            'Nasi',
            'Bami',
            'Mihoen',
            'Tjap Tjoy',
            'Kroket',
            'Frikandel',
            'Kipnuggets',
            'Kleine Sambal',
            'Grote Sambal',
            'Kleine Ketjap',
            'Foe Yong Hai Ling Fa',
            'Foe Yong Hai met kip',
            'Foe Yong Hai met garnalen',
            'Foe Yong Hai met varkensvlees',
            'Foe Yong Hai met cha sieuw',
            'Foe Yong Hai met ossenhaas',
            'Foe Yong Hai met bami',
            'Foe Yong Hai met nasi',
            'Babi Pangang',
            'Babi Pangang met zoetzure saus',
            'Babi Pangang met pikante saus',
            'Babi Pangang met ketjapsaus',
            'Visfilet met zoetzure saus',
            'Visfilet met pikante saus',
            'Visfilet met ketjapsaus',
            'Visfilet met knoflooksaus',
            'Tiepan Ling Fa',
            'Tiepan met kip',
            'Tiepan met garnalen',
            'Tiepan met varkensvlees',
            'Tiepan met cha sieuw',
            'Tiepan met ossenhaas',
            'Tiepan met bami',
            'Tiepan met nasi',
            'Peking eend',
            'Peking eend met zoetzure saus',
            'Peking eend met pikante saus',
        ];
        $categories = [
            'Voorgerechten',
            'Soepen',
            'Loempia\'s',
            'Garnalen',
            'Saté',
            'Kroepoek',
            'Rijst',
            'Nasi',
            'Bami',
            'Mihoen',
            'Bijgerechten',
            'Foe Yong Hai',
            'Babi Pangang',
            'Visfilet',
            'Tiepan',
            'Peking eend',
        ];

        return [
            'menu_number' => $this->faker->numberBetween(1, 100),
            'menu_addition' => $this->faker->optional(weight: 0.2)->randomLetter,
            'name' => $dishNames[array_rand($dishNames)],
            'price' => $this->faker->optional(weight: 0.9)->randomFloat(2, 1, 100),
            'category' => $categories[array_rand($categories)],
            'description' => $this->faker->optional(weight: 0.8)->sentence,
        ];
    }
}
