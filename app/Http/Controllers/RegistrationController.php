<?php

namespace App\Http\Controllers;

use App\Models\Registration;
//use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Menampilkan daftar pendaftaran.
     */
    public function index()
    {
        $registrations = Registration::with('event')->latest()->get();

        return view('registrations.index', compact('registrations'));
    }

    /**
     * Menghapus data pendaftaran.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->route('registrations.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}