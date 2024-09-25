<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Laravel',
            ],
            [
                'id' => 2,
                'name' => 'Angular',
            ],
            [
                'id' => 3,
                'name' => 'Python',
            ],
            [
                'id' => 4,
                'name' => 'Flutter',
            ],
            [
                'id' => 5,
                'name' => 'React',
            ],
        ];

        foreach ($categories as $category) {
            Tag::updateOrCreate(
                ['id' => $category['id']],
                [
                    'name' => $category['name'],
                ]
            );
        }
    }
}
