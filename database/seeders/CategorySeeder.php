<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Announcements',
            'Campus Life',
            'Events',
            'Projects',
            'Tutorials',
        ];

        foreach ($names as $name) {
            Category::query()->updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
