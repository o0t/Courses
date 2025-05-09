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
        $article = "
                <h1>The Evolution of Technology</h1>

                <h2>Introduction</h2>
                <p>
                    Technology has been a driving force behind human progress for centuries. From the invention of the wheel to the rise of the internet, each technological advancement has fundamentally changed the way we live, work, and interact with one another. This article explores the evolution of technology, highlighting key developments and their impact on society.
                </p>

                <h2>1. The Dawn of Technology</h2>
                <p>
                    The history of technology dates back to ancient times when early humans used simple tools made from stone, wood, and bone. These tools were essential for hunting, gathering, and survival. As societies evolved, so did technology.
                </p>
                <ul>
                    <li><strong>Stone Age:</strong> The use of flint tools marked the beginning of technological innovation.</li>
                    <li><strong>Agricultural Revolution:</strong> The transition to farming led to surplus food and population growth.</li>
                    <li><strong>Metallurgy:</strong> The discovery of metalworking revolutionized tool-making.</li>
                </ul>

                <h2>2. The Industrial Revolution</h2>
                <p>
                    The Industrial Revolution, beginning in the late 18th century, marked a significant turning point in technology. It introduced machinery that transformed industries and economies.
                </p>
                <ul>
                    <li><strong>Steam Engine:</strong> Pioneered by James Watt, it enabled the mechanization of industries.</li>
                    <li><strong>Textile Industry:</strong> Innovations like the spinning jenny increased production rates.</li>
                    <li><strong>Transportation:</strong> The development of railroads and steamships connected distant regions.</li>
                </ul>

                <h2>3. The Age of Electronics</h2>
                <p>
                    The 20th century brought about the age of electronics, fundamentally altering communication and entertainment.
                </p>
                <ul>
                    <li><strong>Television:</strong> Changed how information was disseminated and entertainment was consumed.</li>
                    <li><strong>Computers:</strong> The invention of the computer revolutionized data processing and storage.</li>
                    <li><strong>Internet:</strong> The emergence of the internet transformed global communication.</li>
                </ul>

                <h2>4. The Information Age</h2>
                <p>
                    The late 20th and early 21st centuries have been characterized by rapid advancements in information technology.
                </p>
                <ul>
                    <li><strong>Smartphones:</strong> These devices have transformed everyday life, providing access to information at our fingertips.</li>
                    <li><strong>Social Media:</strong> Platforms like Facebook and Twitter have revolutionized communication.</li>
                    <li><strong>Cloud Computing:</strong> Allows for data storage and processing over the internet, enhancing accessibility.</li>
                </ul>

                <h2>5. Emerging Technologies</h2>
                <p>
                    Today, we are witnessing the rise of emerging technologies that promise to reshape our future.
                </p>
                <ul>
                    <li><strong>Artificial Intelligence:</strong> AI is transforming industries by automating tasks and providing insights.</li>
                    <li><strong>Blockchain:</strong> This technology is revolutionizing finance and supply chain management.</li>
                    <li><strong>Biotechnology:</strong> Innovations in genetics are leading to breakthroughs in medicine and agriculture.</li>
                </ul>

                <h2>6. The Impact of Technology on Society</h2>
                <p>
                    Technology has profound implications for society, influencing how we interact, work, and live.
                </p>
                <ul>
                    <li><strong>Workplace Transformation:</strong> Remote work and digital collaboration tools have changed traditional work environments.</li>
                    <li><strong>Education:</strong> Online learning platforms are making education more accessible.</li>
                    <li><strong>Privacy Concerns:</strong> As technology advances, issues of data privacy and security become increasingly important.</li>
                </ul>

                <h2>Conclusion</h2>
                <p>
                    The evolution of technology is a testament to human ingenuity and creativity. As we continue to innovate, it is crucial to consider the ethical implications and societal impacts of these advancements. The future of technology holds immense potential, and it is up to us to harness it responsibly for the benefit of all.
                </p>
            ";
        return [
            'courses_id'    => Courses::all()->random()->id,
            'user_id'       => User::all()->random()->id,
            'name'          => $this->faker->jobTitle(),
            'title'         => $this->faker->text(40),
            'article'       => $article,
            'image'         => 'articles.png',
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
