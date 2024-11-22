<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCriteria;
use App\Models\Score;
use App\Models\Contestant;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all('id', 'name', 'photo_path');
        return view('event.index', compact('events'));
    }

    public function show_contestants($event)
    {
        $photogenic = Score::where('event_id',1)->where('score','>',0)->where('user_id',session('user'))->first(['contestant_id']);
        $event = Event::where('id', $event)->first(['id', 'name']);
        $contestants = Contestant::join('groups', 'groups.id', 'group_id')->
            get([
                'contestants.id',
                'contestants.name',
                'contestants.photo_path',
                'groups.name as group_name',
                'groups.color'
            ]);
        if ($event->id == 1)
            return view('event.photogenic', compact('event', 'contestants', 'photogenic'));
        return view('event.contestants', compact('event', 'contestants'));
    }

    public function score($event, $contestant)
    {
        $event = Event::where('id', $event)->first(['id', 'name']);

        $contestant = Contestant::where('id', $contestant)->first(['id', 'name', 'photo_path']);
        $contestant['max'] = Contestant::count();
        $contestant['prev'] = Contestant::where('id', $contestant['id'] == 1 ? $contestant['max'] : $contestant['id'] - 1)->first(['name', 'photo_path']);
        $contestant['next'] = Contestant::where('id', $contestant['id'] == $contestant['max'] ? 1 : $contestant['id'] + 1)->first(['name', 'photo_path']);

        $criterias = EventCriteria::
            join('criterias', 'criterias.id', 'event_criterias.criteria_id')->
            join('events', 'events.id', 'event_criterias.event_id')->
            where('event_id', $event->id)->
            get(['event_criterias.id', 'criterias.name as criteria', 'events.name as event']);

        $scores = Score::
            where('user_id', session('user'))->
            where('event_id', $event['id'])->
            where('contestant_id', $contestant['id'])->
            get(['criteria_id', 'score']);

        foreach ($criterias as $criteria)
            foreach ($scores as $score)
                if ($criteria['id'] == $score['criteria_id']) {
                    $criteria['score'] = $score['score'] ?: 0;
                    break;
                }
        return view('event.score', compact('event', 'contestant', 'criterias'));
    }
}
