<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventRequestStore;
use App\Repositories\Events;
use Illuminate\Validation\Rule;

class EventController extends Controller
{

    /**
     * Add event view
     *
     * @return \Illuminate\Http\Response
     */
    public function add() {

        $event = new Event();

        return view('event.edit')->with(compact('event'));
    }

    /**
     * Event show view
     *
     * @param  \App\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event) {

        return view('event.edit')->with(compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequestStore $request) {
        $event = new Event;
        $event->fill($request->all());
        if ($event->save()) {
            return redirect()->action('IndexController@index')->with('status', 'Event added!');
        }

        return redirect()->action('IndexController@index')->with('status', 'Event not added!');
    }

    /**
     * Delete event
     *
     * @param  \App\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event) {
        if ($event->delete()) {
            return redirect()->action('IndexController@index')->with('status', "Event deleted!");
        }

        return redirect()->action('IndexController@index')->withErrors("Event not deleted!");
    }

    /**
     * Update event.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event) {
        $this->validate($request, [
            'date' => Rule::unique('event', 'date')->ignore($event->id)
        ]);
        $event->fill($request->all());
        if ($event->save()) {
            return redirect()->action('IndexController@index')->with('status', 'Event updated!');
        }

        return redirect()->action('IndexController@index')->with('status', 'Event not updated!');
    }

    /**
     *
     * Return events in json format API
     *
     * @param Events $repositoryEvents
     */
    public function events(Events $eventsRepository) {
        return $eventsRepository->get();
    }
}
