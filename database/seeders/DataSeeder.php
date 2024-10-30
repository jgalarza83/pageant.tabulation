<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Event;
use App\Models\Group;
use App\Models\Criteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GROUP Table
        $groups = [
            ['Swift Sparrows', 'sparrows'],
            ['Java Falcons', 'falcons'],
            ['Python Parrots', 'parrots'],
            ['SQL Bluebirds', 'bluebirds'],
            ['C# Pelicans', 'pelicans'],
            ['PHP Hawks', 'hawks'],
            ['TypeScript Terns', 'terns'],
            ['CSS Cardinals', 'cardinals'],
            ['Scala Skylarks', 'skylarks'],
            ['HTML Hummingbirds', 'hummingbirds'],
        ];

        foreach ($groups as $group)
            Group::create([
                'name' => $group[0],
                'color' => $group[1],
            ]);

        // EVENT Table
        $events = [
            'photogenic',
            'congeniality',
            'people choice',
            'creative jeans',
            'production',
            'sport',
            'evening',
            'picture analysis',
        ];

        foreach ($events as $event)
            Event::create([
                'name' => $event,
            ]);

        // CRITERIA Table
        $criterias = [
            'facial expresion',
            'visual appeal',
            'charisma',
            'confidence',
            'creativity',
            'originality',
            'design appropriateness',
            'execution',
            'stage presence',
            'energy',
            'coordination',
            'walk',
            'audience impact',
            'elegance',
            'poise',
            'appearance',
            'relevance',
            'content',
            'clarity',
            'diction',
            'time management',
            'impact',
            'overall',
        ];

        foreach ($criterias as $criteria)
            Criteria::create([
                'name' => $criteria,
            ]);

        // ROLES Table
        $roles = [
            'admin',
            'judge',
            'guest',
        ];

        foreach ($roles as $role)
            Role::create([
                'name' => $role,
            ]);
    }
}
