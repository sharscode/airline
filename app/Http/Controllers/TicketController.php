<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Flight;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|string|max:14',
            'seat_number' => 'required|string|max:3|unique:tickets,seat_number,NULL,id,flight_id,' . $request->flight_id,
        ], [
            'seat_number.unique' => 'Nomor kursi sudah diambil untuk penerbangan ini.'
        ]);
        Ticket::create([
            'flight_id' => $validatedData['flight_id'],
            'passenger_name' => $validatedData['passenger_name'],
            'passenger_phone' => $validatedData['passenger_phone'],
            'seat_number' => $validatedData['seat_number'],
            'is_boarding' => false,
        ]);

        return redirect()->back()->with('success', 'Tiket berhasil dipesan.');
    }

    public function board($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'is_boarding' => true,
            'boarding_time' => now(),
        ]);

        return redirect()->back()->with('success', 'Penumpang sudah boarding.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->back()->with('success', 'Tiket berhasil dihapus.');
    }
}
