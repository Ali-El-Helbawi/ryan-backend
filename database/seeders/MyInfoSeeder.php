<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalInfo;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;

class MyInfoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Personal Info
        PersonalInfo::create([
            'name' => 'Ali El-Helbawi',
            'title' => 'Front-End Mobile Developer',
            'bio' => 'Enthusiastic Mobile Application Developer with 3.5 years of experience in building top-quality products.',
            'profile_picture_url' => 'https://media.licdn.com/dms/image/v2/D4D35AQHc732J-aWnsg/profile-framedphoto-shrink_400_400/profile-framedphoto-shrink_400_400/0/1722941957566?e=1739520000&v=beta&t=nC4OS5i2bc1TEPZPLNTQv0KgA3u0M92lI4zm58J2XHg',
            'mobile_number' => '+961 78 880066',
        ]);

        // Seed Experiences
        Experience::insert([
            [
                'job_title' => 'Front-End Mobile Developer',
                'company' => 'WhiteBeard',
                'start_date' => '2022-05-01',
                'end_date' => '2024-08-01',
                'description' => 'Worked on React Native apps, integrated APIs, Firebase, and optimized performance.',
            ],
            [
                'job_title' => 'Front-End Mobile Developer Intern',
                'company' => 'Pro-Solution',
                'start_date' => '2021-12-01',
                'end_date' => '2022-05-01',
                'description' => 'React Native internship with hands-on development experience.',
            ],
        ]);

        // Seed Education
        Education::insert([
            [
                'institution' => 'Lebanese International University',
                'degree' => 'Masters of Science in Computer & Communication Engineering',
                'start_date' => '2015-09-01',
                'end_date' => '2017-07-01',
                'description' => 'Advanced studies in communication and software engineering.',
            ],
            [
                'institution' => 'Lebanese International University',
                'degree' => 'Bachelor of Science in Computer Engineering',
                'start_date' => '2011-09-01',
                'end_date' => '2015-07-01',
                'description' => 'Focused on software development and hardware systems.',
            ],
            [
                'institution' => 'SE Factory',
                'degree' => 'Full-Stack Web Development Program',
                'start_date' => '2021-08-01',
                'end_date' => '2021-11-01',
                'description' => 'Intensive program covering full-stack web development, cloud architecture, and security.',
            ],
        ]);

        // Seed Skills
        Skill::insert([
            ['name' => 'React Native', 'level' => 90],
            ['name' => 'JavaScript', 'level' => 85],
            ['name' => 'Redux', 'level' => 80],
            ['name' => 'Zustand', 'level' => 75],
            ['name' => 'Firebase', 'level' => 85],
            ['name' => 'TypeScript', 'level' => 70],
            ['name' => 'HTML & CSS', 'level' => 80],
        ]);

        // Seed Projects
        Project::insert([
            [
                'title' => 'Raseef22',
                'description' => 'An independent media platform for reading articles in multiple languages with subscription and commenting features.',
                'image' => 'https://example.com/raseef22.jpg',
                'link' => 'https://raseef22.com',
                'tech_stack' => 'React Native, Firebase, Redux, Zustand',
            ],
            [
                'title' => 'Various News Apps',
                'description' => 'Contributed to fixing bugs, adding features, and maintaining multiple news applications.',
                'image' => 'https://example.com/news_apps.jpg',
                'link' => 'https://news.example.com',
                'tech_stack' => 'React Native, API Integration, Performance Optimization',
            ],
        ]);
    }
}
