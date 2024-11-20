@extends('layouts.app')

@section('title', 'Ticket Booking')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Ticket Booking for {{ $flight->flight_code }}</h2>

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

        {{-- Informasi penerbangan --}}
        <div class="flex justify-between items-center mb-6 border-b-2 pb-2">
            <div>
                <p>{{ $flight->origin }} &rarr; {{ $flight->destination }}</p>
            </div>
            <div class="text-right">
                <p>Departure: <strong>{{ \Carbon\Carbon::parse($flight->departure_time)->format('l, d F Y, H:i') }}</strong></p>
                <p>Arrival: <strong>{{ \Carbon\Carbon::parse($flight->arrival_time)->format('l, d F Y, H:i') }}</strong></p>
            </div>
        </div>

        {{-- Form Pemesanan Tiket --}}
        <form action="{{ route('ticket.submit') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <input type="hidden" name="flight_id" value="{{ $flight->id }}">

            <div class="mb-4">
                <label for="passenger_name" class="block text-gray-700 font-bold">Passenger Name:</label>
                <input type="text" name="passenger_name" id="passenger_name" class="w-full border-gray-300 rounded-lg px-4 py-2" placeholder="Enter passenger name" value="{{ old('passenger_name') }}" required>
            </div>

            <div class="mb-4">
                <label for="passenger_phone" class="block text-gray-700 font-bold">Passenger Phone:</label>
                <input type="text" name="passenger_phone" id="passenger_phone" class="w-full border-gray-300 rounded-lg px-4 py-2" placeholder="Enter passenger phone number" value="{{ old('passenger_phone') }}" required>
            </div>

            <div class="mb-4">
                <label for="seat_number" class="block text-gray-700 font-bold">Seat Number:</label>
                <input type="text" name="seat_number" id="seat_number" class="w-full border-gray-300 rounded-lg px-4 py-2" placeholder="Enter seat number" value="{{ old('seat_number') }}" required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('flights.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Book Ticket</button>
            </div>
        </form>
    </div>
@endsection
