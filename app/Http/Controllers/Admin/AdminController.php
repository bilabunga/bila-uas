<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Registration;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $events = Event::latest()->take(3)->get();

        $totalEvents = Event::count();
        $totalCategories = Category::count();
        $totalPeserta = Registration::distinct('user_id')->count('user_id');
        $totalPendaftaran = Registration::count();

        return view('admin.dashboard', compact(
            'events',
            'totalEvents',
            'totalPeserta',
            'totalCategories',
            'totalPendaftaran'
        ));
    }
}