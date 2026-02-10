<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $categoryMap = Category::query()->pluck('id', 'slug');

        $posts = [
            [
                'category_slug' => 'announcements',
                'title' => 'Semester Kickoff',
                'description' => 'Welcome back. Please check the updated class schedules and room assignments.',
            ],
            [
                'category_slug' => 'announcements',
                'title' => 'Tuition Payment Window',
                'description' => 'Payments are accepted from February 12 to February 28 at the cashier office.',
            ],
            [
                'category_slug' => 'campus-life',
                'title' => 'Library Extended Hours',
                'description' => 'The main library will stay open until 10 PM during finals week.',
            ],
            [
                'category_slug' => 'campus-life',
                'title' => 'Cafeteria Menu Update',
                'description' => 'New affordable meal sets are now available from Monday to Friday.',
            ],
            [
                'category_slug' => 'events',
                'title' => 'Hack Night',
                'description' => 'Bring a laptop and join us for a casual coding meetup every Friday.',
            ],
            [
                'category_slug' => 'events',
                'title' => 'Leadership Seminar',
                'description' => 'Guest speakers will discuss teamwork and project planning strategies.',
            ],
            [
                'category_slug' => 'projects',
                'title' => 'Capstone Showcase',
                'description' => 'Final-year students will present their projects in the auditorium.',
            ],
            [
                'category_slug' => 'projects',
                'title' => 'Mini App Challenge',
                'description' => 'Create a small app in one week and share it with your class.',
            ],
            [
                'category_slug' => 'tutorials',
                'title' => 'Laravel Basics',
                'description' => 'Short guide to controllers, routes, and views for beginners.',
            ],
            [
                'category_slug' => 'tutorials',
                'title' => 'Database Seeding 101',
                'description' => 'Learn how to populate your tables with demo data for testing.',
            ],
            [
                'category_slug' => 'events',
                'title' => 'Career Talk',
                'description' => 'Industry guests will share tips about internships and portfolios.',
            ],
            [
                'category_slug' => 'announcements',
                'title' => 'ID Card Release',
                'description' => 'Claim your updated ID at the registrar with a valid receipt.',
            ],
        ];

        foreach ($posts as $post) {
            $categoryId = $categoryMap[$post['category_slug']] ?? null;

            if (!$categoryId) {
                continue;
            }

            Post::query()->updateOrCreate(
                ['title' => $post['title']],
                [
                    'category_id' => $categoryId,
                    'description' => $post['description'],
                ]
            );
        }
    }
}
