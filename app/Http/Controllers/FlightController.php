<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function tickets($id)
    {
        $flight = Flight::with('tickets')->findOrFail($id);
        return view('flights.details', compact('flight'));
    }

    public function book($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.book', compact('flight'));
    }
}
