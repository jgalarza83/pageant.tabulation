<?php

namespace App\Http\Controllers;

use App\Models\EventCriteria;
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
        if (session()->get('role') != 1)
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
                    foreach (Score::where('scores.event_id', $event->id)
                        ->join('event_criterias', 'event_criterias.id', 'scores.criteria_id')
                        ->where('contestant_id', $contestant->id)
                        ->where('user_id', $judge->id)
                        ->get() as $score)
                        $myScore += number_format($score->scoreWeight, 2);
                    $scoreByJudge[$judge->name] = $myScore;
                    $scores[$contestant->name] = $scoreByJudge;
                }
            }
            $byEvents[$event->name] = $scores;
        }

        foreach ($contestants as $contestant) {
            $scores = [];
            foreach ($events as $event) {
                if ($event->id == 1)
                    continue;
                $scoreByJudge = [];
                foreach ($judges as $judge) {
                    $myScore = 0;
                    foreach (Score::where('scores.event_id', $event->id)->join('event_criterias', 'event_criterias.id', 'scores.criteria_id')->where('contestant_id', $contestant->id)->where('user_id', $judge->id)->get() as $score)
                        $myScore += number_format($score->scoreWeight, 2);
                    $scoreByJudge[$judge->name] = $myScore;
                }
                $scores[$event->name] = $scoreByJudge;
            }
            $byContestants[$contestant->name] = $scores;
        }

        $leaders = $this->leaders();
        return view('score.index', compact('judges', 'byEvents', 'byContestants', 'leaders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (session()->get('role') != 2)
            return back()->with('msg', 'Input Invalid');
        $data = $request->except(['_token', 'event_id', 'contestant_id']);
        $event_weight = Event::where('id', $request->event_id)->first('weight');
        foreach ($data as $id => $value) {
            $criteria_weight = EventCriteria::where('id', $id)->first('weight');

            $score = Score::where('user_id', session('user'))->
                where('scores.event_id', $request->event_id)->
                where('contestant_id', $request->contestant_id)->
                where('scores.criteria_id', $id)->
                first();

            if ($score == null)
                Score::create([
                    'user_id' => session('user'),
                    'event_id' => $request->event_id,
                    'contestant_id' => $request->contestant_id,
                    'criteria_id' => $id,
                    'score' => $value ?: 0,
                    'scoreWeight' => ($value * $criteria_weight->weight * $event_weight->weight) / 1000 ?: 0,
                ]);
            else
                Score::where('user_id', session('user'))->
                    where('scores.event_id', $request->event_id)->
                    where('contestant_id', $request->contestant_id)->
                    where('scores.criteria_id', $id)->
                    update([
                        'score' => $value ?: 0,
                        'scoreWeight' => ($value * $criteria_weight->weight * $event_weight->weight) / 1000,
                    ]);
        }
        return back()->with('msg', 'Recorded');
    }

    public function photogenic(Request $request)
    {
        Score::where('event_id', $request->event)
            ->where('user_id', session('user'))
            ->delete();

        Score::create([
            'user_id' => session('user'),
            'event_id' => $request->event,
            'criteria_id' => 17,
            'contestant_id' => $request->contestant,
            'score' => 1,
            'scoreWeight' => 1,
        ]);
        return redirect()->back()->with('msg','Recorded');
    }

    public function leaders()
    {
        $scores = [];
        $contestants = Contestant::all(['id', 'name']);
        foreach ($contestants as $contestant) {
            $score = Score::where('contestant_id', $contestant->id)
                ->where('event_id','>',1)
                ->sum('scoreWeight');
            $scores[$contestant->name] = $score;
        }
        arsort($scores);
        foreach ($scores as $name => $score)
            $scores[] = [
                'name' => $name,
                'score' => $score,
            ];
        return $scores;
    }
}
