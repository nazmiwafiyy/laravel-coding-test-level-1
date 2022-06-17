<?php

namespace App\Http\Controllers\Web;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(5);
        return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'start_at' => 'required|date|date_format:Y-m-d',
            'end_at' => 'required|date|date_format:Y-m-d|after_or_equal:start_at',
        ]);
        if($event = Event::create($request->all())) {
            Session::flash('success', 'Event has been successfully created.');
        }else{
            Session::flash('error', 'Event could not be created.');
        }

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'start_at' => 'required|date|date_format:Y-m-d',
            'end_at' => 'required|date|date_format:Y-m-d|after_or_equal:start_at',
        ]);

        $event->fill($request->all());

        if ($event->save()){
            Session::flash('success', 'Event has been successfully updated.');
        }else{
            Session::flash('error', 'Event could not be updated.');
        }

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event->delete()) {
            Session::flash('success', 'Event has been successfully deleted.');
        }else{
            Session::flash('error', 'Event could not be deleted.');
        }

        return redirect()->back();
    }
}
