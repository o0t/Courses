<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'courses_id'    => Courses::all()->random()->id,
            'user_id'       => User::all()->random()->id,
            'name'          => $this->faker->domainName(),
            'description'   => $this->faker->text(50),
            'article'       => $this->faker->text(200),
            'image_out'     => 'image0.06cca95a-4bdc-4163-83e1-1d38772978db-1727649826.png',
            'url'           => $this->generateUniqueUrl(),
            'likes'         => $this->faker->numberBetween(1,300),
            'views'         => $this->faker->numberBetween(1,1000),
            'token'         => Str::random(10),
            'updated_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
            'created_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }


    private function generateUniqueUrl()
    {
        do {
            // Generate a random string, you can customize this
            $uniqueString = Str::random(10);
            $url = "https://example.com/article/{$uniqueString}";
        } while (DB::table('articles')->where('url', $url)->exists());

        return $url;
    }

}
