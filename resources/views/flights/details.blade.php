@extends('layouts.app')

@section('title', 'Detail Penerbangan')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Ticket Details for {{ $flight->flight_code }}</h2>

        {{-- Tampilkan pesan sukses --}}
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tampilkan pesan error --}}
        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Hitung total penumpang dan penumpang yang sudah boarding --}}
        @php
            $totalPassengers = $flight->tickets->count();
            $totalBoardings = $flight->tickets->where('is_boarding', true)->count();
        @endphp

        <div class="flex justify-between items-center mb-6">
            <div>
                <p>{{ $flight->origin }} &rarr; {{ $flight->destination }}</p>
                <p>Departure: <strong>{{ \Carbon\Carbon::parse($flight->departure_time)->format('l, d F Y, H:i') }}</strong></p>
                <p>Arrival: <strong>{{ \Carbon\Carbon::parse($flight->arrival_time)->format('l, d F Y, H:i') }}</strong></p>
            </div>
            <div>
                <p class="text-lg font-bold">{{ $totalPassengers }} passengers • {{ $totalBoardings }} boardings</p>
            </div>
        </div>

        <h3 class="text-xl font-bold mt-6">Passengers list</h3>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Passenger Name</th>
                    <th class="border px-4 py-2">Passenger Phone</th>
                    <th class="border px-4 py-2">Seat Number</th>
                    <th class="border px-4 py-2">Boarding</th>
                    <th class="border px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flight->tickets as $ticket)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $ticket->passenger_name }}</td>
                        <td class="border px-4 py-2">{{ $ticket->passenger_phone }}</td>
                        <td class="border px-4 py-2">{{ $ticket->seat_number }}</td>
                        <td class="border px-4 py-2">
                            @if($ticket->is_boarding)
                                {{ \Carbon\Carbon::parse($ticket->boarding_time)->format('d-m-Y, H:i') }}
                            @else
                                <form action="{{ route('ticket.board', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Confirm</button>
                                </form>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            @if(!$ticket->is_boarding)
                                <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                </form>
                            @else
                                <span class="text-gray-500">Already Boarded</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('flights.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
@endsection
