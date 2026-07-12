<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // Halaman form pendaftaran
    public function create(Event $event)
    {
        return view('user.registrations.create', compact('event'));
    }


    // Simpan pendaftaran
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Registration::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'Pending',
        ]);

        return redirect()->route('user.events.index')
            ->with('success', 'Pendaftaran berhasil!');
    }


    // Lihat pendaftaran user
    public function myRegistrations()
    {
        $registrations = Registration::with('event')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.registrations.index', compact('registrations'));
    }


    // Admin melihat semua pendaftaran
    public function index()
    {
        $registrations = Registration::with('event', 'user')
            ->latest()
            ->get();

        return view('registrations.index', compact('registrations'));
    }


    // Admin ACC pendaftaran
    public function approve($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->update([
            'status' => 'Approved'
        ]);

        return back()->with('success', 'Pendaftaran berhasil disetujui.');
    }


    // Admin menolak pendaftaran
    public function reject($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->update([
            'status' => 'Rejected'
        ]);

        return back()->with('success', 'Pendaftaran ditolak.');
    }


    // Admin mengupdate status manual
    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $registration->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status berhasil diperbarui.');
    }


    // Admin menghapus pendaftaran
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return back()->with('success', 'Pendaftaran berhasil dihapus.');
    }
}