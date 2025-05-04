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

        $tags = [
            ['name' => 'Web development',           'img' => 'web-development.png'],
            ['name' => 'Mobile app development',    'img' => 'mobile-development.png'],
            ['name' => 'Data science',              'img' => 'data-science.png'],
            ['name' => 'Cybersecurity',             'img' => 'cybersecurity.png'],
            ['name' => 'Artificial Intelligence',    'img' => 'artificial-intelligence.png'],
            ['name' => 'Operating Systems',         'img' => 'operating-systems.png'],
            ['name' => 'Computer network',          'img' => 'computer-network.png'],
            ['name' => 'DevOps',                    'img' => 'devops.png'],
            ['name' => 'Programming languages',     'img' => 'programming-languages.png'],
            ['name' => 'Other',                     'img' => 'other.png'],
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag['name'],
                'img' => $tag['img'],
            ]);
        }


    }
}
