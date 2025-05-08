<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\Likes_comments;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikesCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Likes_comments::class;

    public function definition()
    {
        $userIds = User::where('id', '!=', 1)->pluck('id')->toArray();
        $contentIds = Content::pluck('id')->toArray();
        $commentds = Content::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($userIds),
            'comment_id'=> $this->faker->randomElement($commentds),
            'content_id' => $this->faker->randomElement($contentIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
