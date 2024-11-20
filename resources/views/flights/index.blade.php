@extends('layouts.app')

@section('title', 'Airline Booking System')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold mb-8 text-center">Airplane Booking System</h2>

        @if($flights->isEmpty())
            <p class="text-center text-gray-600">No flights available at the moment.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($flights as $flight)
                    <div class="bg-gray-100 shadow-md rounded-lg p-6 text-center">
                        <h3 class="text-2xl font-bold mb-2">{{ $flight->flight_code }}</h3>
                        <p class="text-lg">{{ $flight->origin }} &rarr; {{ $flight->destination }}</p>
                        <p class="mt-4 text-sm text-gray-700">
                            <span class="font-bold">Departure</span><br>
                            {{ \Carbon\Carbon::parse($flight->departure_time)->format('l, d F Y, H:i') }}
                        </p>
                        <p class="mt-2 text-sm text-gray-700">
                            <span class="font-bold">Arrival</span><br>
                            {{ \Carbon\Carbon::parse($flight->arrival_time)->format('l, d F Y, H:i') }}
                        </p>

                        <div class="mt-6">
                            <a href="{{ route('flights.book', $flight->id) }}" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg mr-2 hover:bg-blue-700"
                               aria-label="Book ticket for flight {{ $flight->flight_code }}">
                               Book Ticket
                            </a>
                            <a href="{{ route('flights.tickets', $flight->id) }}" 
                               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600"
                               aria-label="View details for flight {{ $flight->flight_code }}">
                               View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
