<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;
use App\Models\Tag;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(4)->create();

        User::factory(2)
                ->has(Job::factory()->count(2))
                ->create();

        $jobs = Job::all();
        $tags = Tag::whereIn('id', [1, 2, 3, 4])->get();

        // attach tags to each job
        foreach ($jobs as $job) {
            $job->tags()->saveMany($tags);
        }
    }
}
