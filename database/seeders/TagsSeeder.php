<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tags = [
            ['name' => 'Front-End', 'img' => 'front-end.png'],
            ['name' => 'Back-End', 'img' => 'back-end.png'],
            ['name' => 'Full-Stack', 'img' => 'full-stack.png'],
            ['name' => 'API', 'img' => 'api.png'],
            ['name' => 'Android', 'img' => 'android.png'],
            ['name' => 'iOS', 'img' => 'ios.png'],
            ['name' => 'Database', 'img' => 'database.png'],
            ['name' => 'Machine Learning', 'img' => 'machine-learning.png'],
            ['name' => 'Artificial Intelligence', 'img' => 'artificial-intelligence.png'],
            ['name' => 'Network', 'img' => 'network.png'],
            ['name' => 'Cybersecurity', 'img' => 'cybersecurity.png'],
            ['name' => 'Linux', 'img' => 'linux.png'],
            ['name' => 'DevOps', 'img' => 'devops.png'],
            ['name' => 'Other', 'img' => 'other.png'],
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag['name'],
                'img' => $tag['img'], // Assuming 'image' is the column name in the tags table
            ]);
        }


    }
}
