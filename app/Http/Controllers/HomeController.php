<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard user
     */
    public function index()
    {
        $events = Event::latest()->take(3)->get();
        $categories = Category::all();

        return view('home', compact('events', 'categories'));
    }

    /**
     * Contoh halaman produk (testing)
     */
    public function produk()
    {
        return "ini contoh untuk halaman produk";
    }
}