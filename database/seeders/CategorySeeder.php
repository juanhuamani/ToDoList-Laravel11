<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Task;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Work',
            'Personal',
            'Family',
            'Study',
            'Health',
            'Hobbies',
            'Others',
        ];

        foreach ($categories as $category) {
            $cate = Category::create([
                'name' => $category,
            ]);
            Task::factory()->count(2)->create()->each(function ($task) use ($cate) {
                $task->categories()->attach($cate->id);
            });
        }
    }
}
