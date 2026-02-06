<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\PageContent;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),  // Change in production!
            'email_verified_at' => now(),
        ]);

        // Create sample services (Futuristic Academic)
        Service::create([
            'title' => 'Neural Architecture',
            'description' => 'Designing the next generation of cognitive interfaces and synthetic intelligence frameworks within the global lattice.',
            'icon' => 'diagram-3',
            'is_active' => true,
            'order' => 1,
        ]);

        Service::create([
            'title' => 'Quantum Ethics',
            'description' => 'Developing legal and ethical frameworks for a post-singularity global society and inter-dimensional governance.',
            'icon' => 'shield-lock',
            'is_active' => true,
            'order' => 2,
        ]);

        Service::create([
            'title' => 'Digital Humanities',
            'description' => 'Preserving human heritage and literary legacy within the recursive data streams of the future registry.',
            'icon' => 'infinity',
            'is_active' => true,
            'order' => 3,
        ]);

        Service::create([
            'title' => 'Applied Cybernetics',
            'description' => 'Mastery of biomechanical integration and advanced robotic systems engineering for human optimization.',
            'icon' => 'boxes',
            'is_active' => true,
            'order' => 4,
        ]);

        Service::create([
            'title' => 'Vanguard Medicine',
            'description' => 'Nanotechnology-based healthcare and genetic optimization research for the next evolutionary step.',
            'icon' => 'activity',
            'is_active' => true,
            'order' => 5,
        ]);

        // Create sample page content (Holographic University)
        PageContent::create([
            'page_name' => 'home',
            'section_name' => 'hero',
            'title' => 'Shaping Post-Human Intelligence Through Excellence',
            'content' => 'The Registry of the Future is now active. Explore the Neural Nexus and synchronize with the next era of academic prestige.',
            'additional_data' => [
                'btn_primary' => 'Enter Registry',
                'btn_secondary' => 'Comm-Link Inquiry'
            ]
        ]);

        PageContent::create([
            'page_name' => 'home',
            'section_name' => 'stats',
            'additional_data' => [
                'Active Neural Links' => '45K+',
                'Quantum Patents' => '890+',
                'Off-World Annexes' => '12'
            ]
        ]);

        PageContent::create([
            'page_name' => 'about',
            'section_name' => 'header',
            'title' => 'Our Story & Mission',
            'content' => 'Building the future through innovation, dedication, and excellence in the neural era.',
        ]);

        PageContent::create([
            'page_name' => 'about',
            'section_name' => 'story',
            'title' => 'Who We Are',
            'content' => 'Founded with a vision to revolutionize the cognitive landscape, we are a team of passionate neural architects dedicated to delivering exceptional research nodes.',
        ]);

        PageContent::create([
            'page_name' => 'about',
            'section_name' => 'mission',
            'title' => 'Our Mission',
            'content' => 'To empower the global collective with innovative technology solutions that drive recursive growth and optimize the human condition.',
        ]);

        PageContent::create([
            'page_name' => 'about',
            'section_name' => 'vision',
            'title' => 'Our Vision',
            'content' => 'To be the most trusted registry of knowledge, recognized for our innovation, holographic integrity, and transformative impact on civilization.',
        ]);

        PageContent::create([
            'page_name' => 'about',
            'section_name' => 'values',
            'title' => 'What Drives Us',
            'content' => 'The principles that guide everything we do',
            'additional_data' => [
                'Innovation' => 'We constantly push boundaries and embrace new technologies to deliver cutting-edge solutions.',
                'Integrity' => 'Honesty and transparency form the foundation of all our client relationships and business practices.',
                'Excellence' => 'We are committed to delivering the highest quality in every project, no matter how big or small.'
            ]
        ]);

        PageContent::create([
            'page_name' => 'contact',
            'section_name' => 'header',
            'title' => 'Connect With the Registry',
            'content' => 'Assisting your neural synchronization and academic journey via our active Comm-Link status.',
        ]);

        PageContent::create([
            'page_name' => 'contact',
            'section_name' => 'registry_info',
            'additional_data' => [
                'Coordinates' => 'Nexus Quad 101, Future City',
                'Comm-Link' => '+99 (0) 243-NEXUS',
                'Neural Email' => 'registry@nexus.edu'
            ]
        ]);
    }
}
