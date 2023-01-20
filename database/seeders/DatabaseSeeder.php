<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Review;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'type' => 1
        ]);

        //series seeder
        $series = [
            [
                'name' => 'Laravel',
                'image' => 'https://laravel-courses.com/storage/series/54e8baab-727e-4593-a78a-e0c22c569b61.png'
            ],
            [
                'name' => 'PHP',
                'image' => 'https://laravel-courses.com/storage/series/c9cb9b3c-4d8c-4df6-a7b7-54047ce907ad.png'
            ],
            [
                'name' => 'Livewire',
                'image' => 'https://laravel-courses.com/storage/series/4dfa5245-e2fc-4dfe-88c9-5f001a180da6.png'
            ],
            [
                'name' => 'Vue.js',
                'image' => 'https://laravel-courses.com/storage/series/7d2e33b5-fcd0-4227-bce6-aa49b976bd7c.png'
            ],
            [
                'name' => 'Alpine.js',
                'image' => 'https://laravel-courses.com/storage/series/fe7d56b4-906c-4970-8c69-25956acb3988.png'
            ],
            [
                'name' => 'Tailwind CSS',
                'image' => 'https://laravel-courses.com/storage/series/e63d6d09-4af0-4a6d-9cee-2daf537afcc8.png'
            ]
        ];
        foreach ($series as $item){
            Series::create([
                'name' => $item['name'],
                'image' => $item['image']
            ]);
        }

        //Platform seeder
        $platforms = ['Laracasts', 'Laravel Daily', 'Codecourse', 'Spatie'];
        foreach ($platforms as $platform){
            Platform::create([
                'name' => $platform
            ]);
        }

        //Topic seeder
        $topics = ['Eloquent', 'Validation', 'Refactoring', 'Testing'];
        foreach ($topics as $topic){
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $topic), '-'));
            Topic::create([
                'name' => $topic,
                'slug' => $slug
            ]);
        }

        //Author seeder
        Author::factory(10)->create();
        // $authors = ['Aminur Islam', 'Arnob', 'AI Arnob', 'Jannatul Ferdaus', 'Banna'];
        // foreach ($authors as $author){
        //     Author::create([
        //         'name' => $author
        //     ]);
        // }

        //Create 50 users
        User::factory(50)->create();

        //Create 100 course
        Course::factory(100)->create();

        //Course_Topic pivot table
        $courses = Course::all();
        foreach ($courses as $course){

            //create course_topic pivot table data
            $topics = Topic::all()->random(rand(1, 4))->pluck('id')->toArray(); //random topics array
            $course->topics()->attach($topics);

            //create course_series pivot table data
            $series = Series::all()->random(rand(1, 4))->pluck('id')->toArray(); //random series array
            $course->series()->attach($series);

            //create course_author pivot table data
            $authors = Author::all()->random(rand(1, 5))->pluck('id')->toArray(); //random series array
            $course->authors()->attach($authors);
        }

        //create 100 reviews
        Review::factory(100)->create();
    }
}
