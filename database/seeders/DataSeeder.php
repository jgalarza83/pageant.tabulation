<?php

namespace Database\Seeders;

use App\Models\Contestant;
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
            ['SQL Bluebirds', 'bluebirds'],
            ['Python Parrots', 'parrots'],
            ['Java Falcons', 'falcons'],
            ['Swift Sparrows', 'sparrows'],
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

        // CONTESTANTS Table
        $contestants = [
            ["Beth Grace L. Patricio",1],
            ["Bhebz Cabantao",2],
            ["Maureen Jane P. Mangmang",3],
            ["Daphne Jeanne J. Omega",4],
            ["Janna C. Priego",5],
            ["Nizael A. Pardillo",6],
            ["TBA",7],
            ["TBA",8],
            ["TBA",9],
            ["TBA",10],
        ];


        foreach ($contestants as $contestant)
            Contestant::create([
                'name' => $contestant[0],
                'group_id' => $contestant[1],
            ]);
    }
}
