<?php

namespace Database\Factories;

use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    // Get all user IDs excluding 1
    $userIds = User::where('id', '!=', 1)->pluck('id')->toArray();

    // Get all comment IDs
    $commentIds = Comments::pluck('id')->toArray();

    return [
        'user_id' => $this->faker->randomElement($userIds), // Random user ID excluding 1
        'comment_id' => $this->faker->randomElement($commentIds), // Random comment ID
        'comment' => $this->faker->sentence(), // Random comment text
        'count_reply' => $this->faker->numberBetween(0, 10), // Random reply count
        'created_at' => now(),
        'updated_at' => now(),
    ];
    }
}
