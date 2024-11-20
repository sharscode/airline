<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController; 
use App\Http\Controllers\TicketController; 

// Route untuk halaman utama
Route::get('/', [FlightController::class, 'index'])->name('flights.index');

// Route untuk daftar penerbangan
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

// Route untuk menampilkan detail tiket dari penerbangan tertentu
Route::get('/flights/tickets/{flight}', [FlightController::class, 'tickets'])->name('flights.tickets');

// Route untuk form pemesanan tiket untuk penerbangan tertentu
Route::get('/flights/book/{flight}', [FlightController::class, 'book'])->name('flights.book');

// Route untuk menyimpan data pemesanan tiket
Route::post('/ticket/submit', [TicketController::class, 'store'])->name('ticket.submit');

// Route untuk mengubah status boarding penumpang
Route::put('/ticket/board/{ticket}', [TicketController::class, 'board'])->name('ticket.board');

// Route untuk menghapus tiket
Route::delete('/ticket/delete/{ticket}', [TicketController::class, 'destroy'])->name('ticket.delete');
