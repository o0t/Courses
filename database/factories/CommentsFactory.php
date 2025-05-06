<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $userIds = User::where('id', '!=', 1)->pluck('id')->toArray();
        $contentIds = Content::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userIds), // Select a random user ID
            'content_id' => $this->faker->randomElement($contentIds), // Select a random content ID
            'comment' => $this->faker->sentence(),
            'token' => $this->faker->uuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
