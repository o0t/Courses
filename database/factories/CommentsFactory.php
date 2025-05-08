<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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

        // Array of comments
        $comments = [
            'Great course!',
            'Thank you for the valuable information.',
            'It was an enjoyable learning experience.',
            'The content was very useful.',
            'I loved the teaching style and the instructor\'s interaction.',
            'A comprehensive and beneficial course.',
            'I will recommend it to my friends.',
            'I learned a lot in a short time.',
            'The course was fun and very helpful.',
            'Thanks to everyone who contributed to organizing this course!',
            'The materials provided were top-notch.',
            'I appreciate the detailed explanations.',
            'The exercises were practical and engaging.',
            'I feel more confident in my skills now.',
            'The instructor was very knowledgeable.',
            'I enjoyed the group discussions and feedback.',
            'This course exceeded my expectations.',
            'I gained new insights that I can apply immediately.',
            'The pace of the course was just right.',
            'I liked the variety of topics covered.',
            'I look forward to applying what I learned.',
            'This was a fantastic experience overall!'
        ];

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'content_id' => $this->faker->randomElement($contentIds),
            'comment' => $this->faker->randomElement($comments), // Randomly select a comment
            'token' => $this->faker->uuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        // {
        //     $userIds = User::where('id', '!=', 1)->pluck('id')->toArray();
        //     $contentIds = Content::pluck('id')->toArray();

        //     // Array of comments
        //     $comments = [
        //         'Great course!',
        //         'Thank you for the valuable information.',
        //         'It was an enjoyable learning experience.',
        //         'The content was very useful.',
        //         'I loved the teaching style and the instructor\'s interaction.',
        //         'A comprehensive and beneficial course.',
        //         'I will recommend it to my friends.',
        //         'I learned a lot in a short time.',
        //         'The course was fun and very helpful.',
        //         'Thanks to everyone who contributed to organizing this course!',
        //         'The materials provided were top-notch.',
        //         'I appreciate the detailed explanations.',
        //         'The exercises were practical and engaging.',
        //         'I feel more confident in my skills now.',
        //         'The instructor was very knowledgeable.',
        //         'I enjoyed the group discussions and feedback.',
        //         'This course exceeded my expectations.',
        //         'I gained new insights that I can apply immediately.',
        //         'The pace of the course was just right.',
        //         'I liked the variety of topics covered.',
        //         'I look forward to applying what I learned.',
        //         'This was a fantastic experience overall!'
        //     ];

        //     $commentsData = [];

        //     foreach ($contentIds as $contentId) {
        //         for ($i = 0; $i < 3; $i++) {
        //             $commentsData[] = [
        //                 'user_id' => $this->faker->randomElement($userIds),
        //                 'content_id' => $contentId,
        //                 'comment' => $this->faker->randomElement($comments),
        //                 'token' => $this->faker->uuid(),
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ];
        //         }
        //     }

        //     // إدراج التعليقات في قاعدة البيانات
        //     DB::table('comments')->insert($commentsData);

        //     return $commentsData;
        // }
    }
}
