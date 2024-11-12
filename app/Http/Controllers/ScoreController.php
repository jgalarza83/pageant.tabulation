<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (session()->get('name') != 'admin')
            return back();

        $events = Event::all('id', 'name');
        $contestants = Contestant::all('id', 'name');
        $judges = User::where('role_id', 2)->get(['id', 'name']);

        $byEvents = [];
        $byContestants = [];

        foreach ($events as $event) {
            $scores = [];
            foreach ($contestants as $contestant) {
                $scoreByJudge = [];
                foreach ($judges as $judge) {
                    $myScore = 0;
                    foreach (Score::where('event_id', $event->id)->where('contestant_id', $contestant->id)->where('user_id', $judge->id)->get() as $score)
                        $myScore += $score->score;
                    $scoreByJudge[$judge->name] = $myScore;
                    $scores[$contestant->name] = $scoreByJudge;
                }
            }
            $byEvents[$event->name] = $scores;
        }

        foreach ($contestants as $contestant) {
            $scores = [];
            foreach ($events as $event) {
                $scoreByJudge = [];
                foreach ($judges as $judge) {
                    $myScore = 0;
                    foreach (Score::where('event_id', $event->id)->where('contestant_id', $contestant->id)->where('user_id', $judge->id)->get() as $score)
                        $myScore += $score->score;
                    $scoreByJudge[$judge->name] = $myScore;
                }
                $scores[$event->name] = $scoreByJudge;
            }
            $byContestants[$contestant->name] = $scores;
        }
        return view('score.index', compact('judges', 'byEvents', 'byContestants'));
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
            $score = Score::where('user_id', session('user'))->
                where('event_id', $request->event_id)->
                where('contestant_id', $request->contestant_id)->
                where('criteria_id', $id)->update(['score' => $value ?: 0]);
            if (!$score)
                Score::create([
                    'user_id' => session('user'),
                    'event_id' => $request->event_id,
                    'contestant_id' => $request->contestant_id,
                    'criteria_id' => $id,
                    'score' => $value ?: 0,
                ]);
        }
        return back()->with('msg','Score has been recorded');
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
