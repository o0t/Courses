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
        $fileNames = [
            'd195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.mp4',
            'd195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.pdf',
        ];

        // Randomly select a file name
        $fileName = $fileNames[array_rand($fileNames)];

        // Mimic getClientOriginalExtension() using pathinfo
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Determine the type based on the file extension
        $type = ($extension === 'mp4') ? 'video' : 'file';

        return [
            'courses_id' => $this->faker->randomDigitNotNull(),
            'title' => 'Default Title',
            'type' => $type,
            'file_name' => $fileName,
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
