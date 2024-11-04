<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Score;
use App\Models\Contestant;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all('id', 'name');
        $contestants = Contestant::all('id', 'name');
        $byEvents = [];
        $byContestants = [];
        foreach ($events as $event) {
            $scores = [];
            foreach ($contestants as $contestant) {
                $myScore = 0;
                foreach (Score::where('event_id', $event->id)->where('contestant_id', $contestant->id)->get() as $score)
                    $myScore += $score->score;
                $scores[$contestant->name] = $myScore;
            }
            $byEvents[$event->name] = $scores;
        }


        foreach ($contestants as $contestant) {
            $scores = [];
            foreach ($events as $event) {
                $myScore = 0;
                foreach (Score::where('event_id', $event->id)->where('contestant_id', $contestant->id)->get() as $score)
                    $myScore += $score->score;
                $scores[$event->name] = $myScore;
            }
            $byContestants[$contestant->name] = $scores;
        }
        return view('score.index', compact('byEvents','byContestants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token', 'event_id', 'contestant_id']);
        foreach ($data as $id => $value) {
            $score = Score::where('event_id', $request->event_id)->
                where('contestant_id', $request->contestant_id)->
                where('criteria_id', $id)->update(['score' => $value]);
            if (!$score)
                Score::create([
                    'event_id' => $request->event_id,
                    'contestant_id' => $request->contestant_id,
                    'criteria_id' => $id,
                    'score' => $value,
                ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        //
    }
}
