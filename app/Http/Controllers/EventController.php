<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\Request;


/**
 * Class EventController
 * @package App\Http\Controllers
 */
class EventController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('event/edit', ['event' => Event::findOrFail($id)]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $time = explode(" - ", $request->input('time'));
        $event = new Event($request->all());
        $event = new Event;
        $event->name = $request->input('name');
        $event->title = $request->input('title');
        $event->start_time = $time[0];
        $event->end_time = $time[1];
        $event->save();

        $request->session()->flash('success', 'The event was successfully saved!');
        return redirect('events/create');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $time = explode(" - ", $request->input('time'));

        $event = Event::findOrFail($id);
        $event->name = $request->input('name');
        $event->title = $request->input('title');
        $event->start_time = $time[0];
        $event->end_time = $time[1];
        $event->save();

        return redirect('events');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('event/view', ['event' => Event::findOrFail($id)]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('events');
    }
}
