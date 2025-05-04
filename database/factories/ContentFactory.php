<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 'url' => b2764071-6c2a-4f95-91bc-d7f2ed2a473c-1725536065.mp4
        // return [
        //     'courses_id' => $course->id,
        //     'title' =>  $this->faker->jobTitle(),
        //     // 'content' => $this->faker->text(200),
        //     // 'type' => 'txt',
        //     'type' => 'video',
        //     'file_name' => 'd195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.mp4',
        //     'updated_at' => $this->faker->time,
        //     'created_at' => $this->faker->time,
        //     'token' => $this->faker->uuid(),
        // ];
        // In your ContentFactory


        // return [
        //     'courses_id' => $this->state(function (array $attributes) {
        //         return $attributes['course_id']; // Use course_id passed during creation
        //     }),
        //     'title' => $this->faker->jobTitle(),
        //     'type' => 'video',
        //     'file_name' => 'd195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.mp4',
        //     'updated_at' => now(), // Use current time
        //     'created_at' => now(), // Use current time
        //     'token' => $this->faker->uuid(),
        // ];


        return [
            'courses_id' => $this->faker->randomDigitNotNull(),
            'title' => 'Default Title', // Placeholder title
            'type' => 'video',
            'file_name' => 'd195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.mp4',
            'updated_at' => now(),
            'created_at' => now(),
            'token' => $this->faker->uuid(),
        ];
    }


    public function withDynamicTitle($courseTitle, $index)
    {
        $randomTitles = [
            "{$courseTitle}",
            "What is {$courseTitle}?",
            "Understanding {$courseTitle}",
            "Introduction to {$courseTitle}",
            "Advanced Concepts of {$courseTitle}",
            "Best Practices for {$courseTitle}",
            "Tips and Tricks for {$courseTitle}",
            "Common Mistakes in {$courseTitle}",
            "Exploring {$courseTitle}",
            "The Future of {$courseTitle}",
            "The Basics of {$courseTitle}",
            "A Beginner's Guide to {$courseTitle}",
            "Why Learn {$courseTitle}?",
            "The Importance of {$courseTitle}",
            "Hands-On Projects for {$courseTitle}",
            "Case Studies in {$courseTitle}",
            "Real-World Applications of {$courseTitle}",
            "Innovative Techniques in {$courseTitle}",
            "Challenges in {$courseTitle}",
            "How to Master {$courseTitle}",
            "A Deep Dive into {$courseTitle}",
            "Essential Tools for {$courseTitle}",
            "FAQs About {$courseTitle}",
            "Myths and Facts about {$courseTitle}",
            "Resources for Learning {$courseTitle}",
            "Key Takeaways from {$courseTitle}",
            "Learning Path for {$courseTitle}",
            "Skills Needed for {$courseTitle}",
            "Career Opportunities in {$courseTitle}",
            "Comparing {$courseTitle} with Other Technologies",
            "Future Trends in {$courseTitle}",
            "Common Misconceptions about {$courseTitle}",
            "Expert Interviews on {$courseTitle}",
            "The Evolution of {$courseTitle}",
            "How to Get Started with {$courseTitle}",
            "Strategies for Success in {$courseTitle}",
            "Integrating {$courseTitle} into Your Workflow",
            "Challenges and Solutions in {$courseTitle}",
            "The Role of {$courseTitle} in Modern Development",
            "Effective Learning Techniques for {$courseTitle}",
            "Building a Portfolio with {$courseTitle}",
            "Networking in the {$courseTitle} Community",
            "Contributing to {$courseTitle} Projects",
            "The Do's and Don'ts of {$courseTitle}",
            "Evaluating Your Skills in {$courseTitle}",
            "What Employers Look for in {$courseTitle} Skills",
            "Certifications in {$courseTitle}",
            "Balancing Theory and Practice in {$courseTitle}",
            "Innovations in {$courseTitle}",
            "Top Resources for Mastering {$courseTitle}",
            "Feedback and Improvement in {$courseTitle}",
            "The Impact of {$courseTitle} on Society",
            "Cultural Perspectives on {$courseTitle}",
            "Success Stories in {$courseTitle}",
            "The Connection between {$courseTitle} and Other Fields",
            "How {$courseTitle} is Changing the Industry",
            "Building a Community Around {$courseTitle}",
            "Tips for Teaching {$courseTitle}",
            "The Best Online Courses for {$courseTitle}",
            "Collaborative Projects in {$courseTitle}",
        ];

        // Generate a unique title for each content instance using the index
        return $this->state([
            'title' => $randomTitles[array_rand($randomTitles)] . " - Part " . ($index + 1),
        ]);
    }
}
