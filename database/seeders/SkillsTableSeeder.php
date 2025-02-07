<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Skill::create(['name' => 'JavaScript', 'level' => 80]);
        Skill::create(['name' => 'PHP', 'level' => 70]);
        Skill::create(['name' => 'Laravel', 'level' => 60]);
        // add more as needed
    }
    // public function run(): void
    // {
    //     \App\Models\Skill::create([
    //         'name' => 'JavaScript',
    //         'level' => 80
    //     ]);
    //     \App\Models\Skill::create([
    //         'name' => 'PHP',
    //         'level' => 70
    //     ]);
    // }
}
