<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * =========================
     * USER
     * =========================
     */

    public function home()
    {
        $events = Event::latest()->take(3)->get();

        return view('home', compact('events'));
    }

    public function userIndex()
    {
        $events = Event::with('category')->latest()->get();

        return view('user.events.index', compact('events'));
    }

    public function userShow(Event $event)
    {
        return view('user.events.show', compact('event'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    /**
     * =========================
     * ADMIN
     * =========================
     */

    public function index()
    {
        $events = Event::with('category', 'user')->latest()->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('events.create', compact('categories'));
    }

    // Tambah Event
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'date' => 'required|date',
            'location' => 'required',
            'quota' => 'required|integer',
            'category_id' => 'required',
        ]);

        $imageName = $request->file('image')->store('events', 'public');

        Event::create([
            'title' => $request->title,
            'tagline' => $request->tagline,
            'description' => $request->description,
            'image' => $imageName,
            'date' => $request->date,
            'location' => $request->location,
            'quota' => $request->quota,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $categories = Category::all();

        return view('events.edit', compact('event', 'categories'));
    }

    // Edit Event
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'date' => 'required|date',
            'location' => 'required',
            'quota' => 'required|integer',
            'category_id' => 'required',
        ]);

        $imageName = $event->image;

        if ($request->hasFile('image')) {

            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            $imageName = $request->file('image')->store('events', 'public');
        }

        $event->update([
            'title' => $request->title,
            'tagline' => $request->tagline,
            'description' => $request->description,
            'image' => $imageName,
            'date' => $request->date,
            'location' => $request->location,
            'quota' => $request->quota,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Event berhasil diupdate.');
    }

    // Hapus Event
    public function destroy(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Event berhasil dihapus.');
    }
}