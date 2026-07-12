@extends('layouts.user')

@section('content')

<div class="container mt-4">

    <h2>Pendaftaran Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Event</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($registrations as $registration)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $registration->event->title }}</td>
                <td>{{ $registration->event->date }}</td>
                <td>{{ $registration->event->location }}</td>
                <td>{{ $registration->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">
                    Belum ada pendaftaran.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection