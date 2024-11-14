<?php

namespace Database\Seeders;

use App\Models\Contestant;
use App\Models\EventCriteria;
use App\Models\Role;
use App\Models\Event;
use App\Models\Group;
use App\Models\Criteria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        // USERS Table
        $users = [
            [1,'Admin','1234'],
            [2,'Jeanyvee Palmes','1111'],
            [2,'Eliza Pantojan','2222'],
            [2,'Ritchelle Maei N. Oring','3333'],
            [2,'judge4','4444'],
            [2,'judge5','5555'],
            [3,'guest','9876'],
        ];
        foreach ($users as $user)
            User::create([
                'role_id' => $user[0],
                'name' => $user[1],
                'passcode' => $user[2],
            ]);

        // GROUP Table
        $groups = [
            ['SQL Bluebirds', 'bluebirds'],
            ['Python Parrots', 'parrots'],
            ['Java Falcons', 'falcons'],
            ['Swift Sparrows', 'sparrows'],
            ['C# Pelicans', 'pelicans'],
            ['PHP Hawks', 'hawks'],
            // ['TypeScript Terns', 'terns'],
            // ['CSS Cardinals', 'cardinals'],
            // ['Scala Skylarks', 'skylarks'],
            // ['HTML Hummingbirds', 'hummingbirds'],
        ];

        foreach ($groups as $group)
            Group::create([
                'name' => $group[0],
                'color' => $group[1],
            ]);

        // EVENT Table
        $events = [
            ['photogenic','photogenic'],
            // ['congeniality','congeniality'],
            // ['people choice','people']
            ['creative jeans','jeans'],
            ['production','production'],
            ['sport attire','sport'],
            ['evening gown','evening'],
            // ['picture analysis','picture'],
        ];

        foreach ($events as $event)
            Event::create([
                'name' => $event[0],
                'photo_path' => $event[1],
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

        // CONTESTANTS Table
        $contestants = [
            ["Beth Grace L. Patricio",1,'beth'],
            ["Bebz A. Cabantao",2,'bebz'],
            ["Maureen Jane P. Mangmang",3,'maureen'],
            ["Nerimaie Sayman",4,'nerimaie'],
            ["Janna C. Priego",5,'janna'],
            ["Trixia Kris B. Orias",6,'trixia'],
        ];

        foreach ($contestants as $contestant)
            Contestant::create([
                'name' => $contestant[0],
                'group_id' => $contestant[1],
                'photo_path' => $contestant[2],
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
            [2,16],
            [2,9],
            [2,13],
            [2,5],
            [2,8],
            // Production Number
            [3,20],
            [3,12],
            [3,13],
            [3,7],
            [3,5],
            // Sports Attire
            [4,5],
            [4,23],
            [4,12],
            [4,9],
            [4,8],
            [4,20],
            [4,2],
            // Evening Wear
            [5,9],
            [5,11],
            [5,18],
            [5,5],
            [5,23],
            [5,20],
            [5,1],
            [5,2],
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
