<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * =========================
     * USER
     * =========================
     */

    public function home()
    {
        return view('home');
    }

    public function userIndex()
    {
        $events = Event::with('category')->latest()->get();

        return view('events.user', compact('events'));
    }

    public function userShow(Event $event)
    {
        return view('user.events.show', compact('event'));
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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'quota' => 'required|integer',
            'category_id' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'tagline' => $request->tagline,
            'description' => $request->description,
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

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'quota' => 'required|integer',
            'category_id' => 'required',
        ]);

        $event->update([
            'title' => $request->title,
            'tagline' => $request->tagline,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'quota' => $request->quota,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Event berhasil diupdate.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Event berhasil dihapus.');
    }
}