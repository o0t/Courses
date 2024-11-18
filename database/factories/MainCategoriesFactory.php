<?php

namespace Database\Factories;

use App\Models\Main_categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainCategoriesFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Main_categories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->randomElement(['Programming languages', 'Web development', 'Mobile app development', 'Data science', 'Cybersecurity', 'Operating Systems', 'Computer network', 'DevOps']),
            'img'  => $this->faker->randomElement(['programming-languages.png', 'web-development.png', 'mobile-development.png', 'data-science.png', 'cybersecurity.png', 'operating-systems.png', 'computer-network.png', 'DevOps.png']),
        ];

    }
}
