<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Mobil;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::withCount('events')->get();
        $mobil = Mobil::all();


        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mobil = Mobil::all();
        // $mobil = Mobil::all()->get('mobil', $mobil);
        // dd($mobil);

        return view('admin.events.create',['mobil' => $mobil], compact('mobil'));
    }

    public function store(StoreEventRequest $request)
    {
        Event::create($request->all());
        // $mobil = Mobil::all();
        // $mobil->mobil()->sync($request->input('mobil'));
        return redirect()->route('admin.systemCalendar');
    }

    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('event')
            ->loadCount('events');
        // $mobil = Mobil::all();

        return view('admin.events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());
        $mobil = Mobil::all();

        return redirect()->route('admin.systemCalendar');
    }

    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('event');
        $mobil = Mobil::all();

        return view('admin.events.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
