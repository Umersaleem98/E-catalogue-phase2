<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        // $events = Event::all();
        $events = Event::where('date', '>=', Carbon::today())->get();
        return view('template.events', compact('events'));
    }

    public function index()
    {
        $events = Event::all();
        return view('adminpage.events.list', compact('events'));
    }
    public function create()
    {

        return view('adminpage.events.index');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'event_title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new event
        $event = new Event;
        $event->event_title = $validated['event_title'];
        $event->subtitle = $validated['subtitle'];
        $event->description = $validated['description'];
        $event->date = $validated['date'];

        // Handle file uploads
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagesName = time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('events'), $imagesName);
            $event->images = $imagesName;
        }


        // Save the event
        $event->save();

        // Redirect or return response
        return redirect()->back()->with('success', 'Event created successfully!');
    }

    public function edit($id)
    {
        $event= Event::find($id);
        return view('adminpage.events.update', compact('event'));

    }

    public function update(Request $request, $id)
{
    // Validate the request
    $validated = $request->validate([
        'event_title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Find the existing event
    $event = Event::findOrFail($id);

    // Update event details
    $event->event_title = $validated['event_title'];
    $event->subtitle = $validated['subtitle'];
    $event->description = $validated['description'];
    $event->date = $validated['date'];

    // Handle file uploads if a new file is provided
    if ($request->hasFile('images')) {
        // Check if the existing image file exists, then delete it
        if ($event->images) {
            $oldImagePath = public_path('events/' . $event->images);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload the new image
        $images = $request->file('images');
        $imagesName = time() . '.' . $images->getClientOriginalExtension();
        $images->move(public_path('events'), $imagesName);
        $event->images = $imagesName;
    }

    // Save the updated event
    $event->save();

    // Redirect or return response
    return redirect()->back()->with('success', 'Event updated successfully!');
}




   
    public function delete($id)
    {
        $event= Event::find($id);
        $event->delete();
        return redirect()->back()->with('success', 'event delete successfully');

    }


    public function sinlge_event($id)
    {
        $event = Event::find($id);
        $allEvents = Event::all(); // Retrieve all events to display below the selected event
        return view('template.event_details', compact('event', 'allEvents'));
    }
    

}
