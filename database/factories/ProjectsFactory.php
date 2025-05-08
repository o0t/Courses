<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $CoursesIds = Courses::pluck('id')->toArray();
        $description = "<h1>Project Description: Project Management Platform</h1>
                    <h2>Overview</h2>
                    <p>
                        The Project Management Platform is a comprehensive solution designed to enhance productivity and facilitate effective collaboration within teams. Built to cater to the needs of small, medium, and large enterprises, this platform provides advanced tools for task organization, progress tracking, and seamless communication among members.
                    </p>

                    <h2>Key Features</h2>

                    <h3>1. Task Management</h3>
                    <ul>
                        <li><strong>Task Creation and Prioritization:</strong> Users can create tasks with detailed descriptions, set priorities, and establish deadlines.</li>
                        <li><strong>Subtask Division:</strong> Tasks can be broken down into smaller subtasks to ensure a smooth workflow.</li>
                        <li><strong>Assignment:</strong> Team members can be assigned specific tasks, allowing for clear accountability.</li>
                    </ul>

                    <h3>2. Progress Tracking</h3>
                    <ul>
                        <li><strong>Interactive Dashboard:</strong> A real-time dashboard displays the status of each project, enabling quick insights into progress.</li>
                        <li><strong>Regular Reports:</strong> Automated reports provide updates on task completion and overall project status.</li>
                        <li><strong>Visual Analytics:</strong> Utilize graphs and charts to analyze performance metrics and identify areas for improvement.</li>
                    </ul>

                    <h3>3. Communication and Collaboration</h3>
                    <ul>
                        <li><strong>Internal Messaging System:</strong> A built-in chat feature allows team members to communicate effectively without leaving the platform.</li>
                        <li><strong>Commenting on Tasks:</strong> Users can leave comments and feedback directly on tasks, promoting clarity and collaboration.</li>
                        <li><strong>File Sharing:</strong> Easily share documents and files within the platform, ensuring everyone has access to the necessary resources.</li>
                    </ul>

                    <h3>4. Time Management</h3>
                    <ul>
                        <li><strong>Time Estimation Tools:</strong> Users can estimate the time required for tasks, aiding in planning and resource allocation.</li>
                        <li><strong>Time Tracking:</strong> Built-in time tracking features allow team members to log hours spent on specific tasks, providing valuable data for analysis.</li>
                    </ul>

                    <h3>5. Integration with Other Tools</h3>
                    <ul>
                        <li><strong>Third-Party Integrations:</strong> Support for integrations with popular applications like Google Drive, Slack, and Trello enhances functionality.</li>
                        <li><strong>API Access:</strong> An API allows external applications to interact with the platform, facilitating customization and flexibility.</li>
                    </ul>

                    <h2>Target Audience</h2>
                    <p>
                        The platform targets project managers, teams, and consultants looking to improve work efficiency and enhance collaboration among team members. It is particularly suitable for organizations aiming to streamline their workflow and increase productivity.
                    </p>

                    <h2>Technical Stack</h2>
                    <ul>
                        <li><strong>Frontend:</strong> Built using HTML, CSS, and JavaScript, leveraging frameworks like React or Vue.js for a smooth user experience.</li>
                        <li><strong>Backend:</strong> The platform utilizes PHP or Node.js with a database system like MySQL or MongoDB for data storage.</li>
                        <li><strong>Security Measures:</strong> Advanced security features, including encryption and secure login processes, protect user data and ensure privacy.</li>
                    </ul>

                    <h2>Conclusion</h2>
                    <p>
                        The Project Management Platform stands as an ideal solution for any team striving to improve work efficiency and collaboration. With its advanced tools and user-friendly interface, teams can focus on achieving their objectives and succeeding in their projects.
                    </p>";
        return [
            'courses_id'    => $this->faker->randomElement($CoursesIds),
            'user_id'       => User::all()->random()->id,
            'name'          => $this->faker->domainName,
            'description'   => $description,
            'image_out'     => 'projects.png',
            // 'image_out'     => $this->faker->imageUrl(100, 100),
            'image1'        => 'projects.png',
            'image2'        => 'projects.png',
            'image3'        => 'projects.png',
            'image4'        => 'projects.png',
            'link1'         => $this->faker->url(),
            'link2'         => $this->faker->url(),
            'likes'         => $this->faker->numberBetween(1,1500),
            'views'         => $this->faker->numberBetween(1,5000),
            'token'         => Str::random(10),
            'updated_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
            'created_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
