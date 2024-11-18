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
        ];

        foreach ($groups as $group)
            Group::create([
                'name' => $group[0],
                'color' => $group[1],
            ]);

        // EVENT Table
        $events = [
            ['photogenic','photogenic'],
            ['creative attire','creative'],
            ['production number','production'],
            ['sport attire','sport'],
            ['evening gown','evening'],
            ['Q&A','evening'],
            // ['people choice','people'],
            // ['congeniality','congeniality'],
            // ['picture analysis','picture'],
        ];

        foreach ($events as $event)
            Event::create([
                'name' => $event[0],
                'photo_path' => $event[1],
            ]);

        // CRITERIA Table
        $criterias = [
            'appearance',                   // 1
            'audience impact',
            'charisma',
            'clarity',
            'confidence',                   // 5
            'content',
            'coordination',
            'creativity',
            'design appropriateness',
            'diction',                      // 10
            'elegance',
            'energy',
            'execution',
            'facial expresion',
            'impact',                       // 15
            'originality',
            'overall',
            'poise',
            'relevance',
            'stage presence',               // 20
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
            ["Maureen Jane P. Mangmang",3,'maureen'],
            ["Bebz A. Cabantao",2,'bebz'],
            ["Trixia Kris B. Orias",6,'trixia'],
            ["Janna C. Priego",5,'janna'],
            ["Nerimaie Sayman",4,'nerimaie'],
            ["Beth Grace L. Patricio",1,'beth'],
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
            [1,14,30],
            [1,22,30],
            [1,3,20],
            [1,5,20],
            // Creative Attire
            [2,16,30],
            [2,9,30],
            [2,13,10],
            [2,5,10],
            [2,8,20],
            // Production Number
            [3,20,40],
            [3,13,30],
            [3,7,15],
            [3,5,15],
            // Sports Attire
            [4,5,35],
            [4,9,25],
            [4,8,15],
            [4,20,15],
            [4,2,10],
            // Evening Wear
            [5,9,20],
            [5,11,30],
            [5,20,30],
            [5,1,10],
            [5,5,10],
            // Q&A
            [6,19,35],
            [6,4,25],
            [6,15,25],
            [6,5,10],
            [6,21,5],
            // Picture Analysis
            // [8,19,null],
            // [8,6,null],
            // [8,4,null],
            // [8,10,null],
            // [8,15,null],
            // [8,5,null],
            // [8,21,null],
        ];

        foreach ($event_criterias as $criteria)
            EventCriteria::create([
                'event_id' => $criteria[0],
                'criteria_id' => $criteria[1],
                'percentile' => $criteria[2],
            ]);
    }
}
