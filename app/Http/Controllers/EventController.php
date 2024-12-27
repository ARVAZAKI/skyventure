<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('features.events', compact('events'));
    }

    public function listEvent()
    {
        $events = Event::where('event_date', '>=', Carbon::now())
            ->orderBy('event_date', 'asc')
            ->get();
    
        return view('event', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = 'event_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/img/events', $image, 'public');
        }

        Event::create([
            'image' => $image,
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
        ]);

        return redirect()->back()->with('success', 'Event successfully created.');
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
        ]);

        $event = Event::findOrFail($id);
        $image = $event->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = 'event_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/img/events', $image, 'public');

            if ($event->image && Storage::exists('/img/events/' . $event->image)) {
                Storage::delete('/img/events/' . $event->image);
            }
        }

        $event->update([
            'image' => $image,
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
        ]);

        return redirect()->back()->with('success', 'Event successfully updated.');
    }


    public function delete($id)
    {
        $event = Event::findOrFail($id);

        if ($event->image && Storage::exists('/img/events/' . $event->image)) {
            Storage::delete('/img/events/' . $event->image);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event successfully deleted.');
    }
}
