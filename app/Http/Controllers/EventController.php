<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all('id','name');
        return view('event.index', compact('events'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function show_contestants($event)
    {
        $event = Event::where('id',$event)->first(['id','name']);
        $contestants = Contestant::join('groups','groups.id','group_id')->
            get([
                'contestants.id',
                'contestants.name',
                'groups.name as group_name',
                'groups.color'
            ]);
        return view('event.contestants', compact('event','contestants'));
    }
}
