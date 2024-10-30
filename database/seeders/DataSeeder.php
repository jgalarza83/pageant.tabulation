<?php

namespace Database\Seeders;

use App\Models\Contestant;
use App\Models\EventCriteria;
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
            'appearance',
            'audience impact',
            'charisma',
            'clarity',
            'confidence',
            'content',
            'coordination',
            'creativity',
            'design appropriateness',
            'diction',
            'elegance',
            'energy',
            'execution',
            'facial expresion',
            'impact',
            'originality',
            'overall',
            'poise',
            'relevance',
            'stage presence',
            'time management',
            'visual appeal',
            'walk',
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

        // EVENT CRITERIA Table
        $event_criterias = [
            // Photogenic
            [1,14],
            [1,22],
            [1,3],
            [1,5],
            [1,8],
            // Creative Jeans
            [4,16],
            [4,9],
            [4,13],
            [4,5],
            [4,8],
            // Production Number
            [5,20],
            [5,12],
            [5,13],
            [5,7],
            [5,5],
            // Sports Attire
            [6,5],
            [6,23],
            [6,12],
            [6,9],
            [6,8],
            [6,20],
            [6,2],
            // Evening Wear
            [7,9],
            [7,11],
            [7,18],
            [7,5],
            [7,23],
            [7,20],
            [7,1],
            [7,2],
            // Picture Analysis
            [8,19],
            [8,6],
            [8,4],
            [8,10],
            [8,15],
            [8,5],
            [8,21],
        ];

        foreach ($event_criterias as $criteria)
            EventCriteria::create([
                'event_id' => $criteria[0],
                'criteria_id' => $criteria[1],
            ]);
    }
}
