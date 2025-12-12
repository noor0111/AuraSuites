<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;



// Home Page - Show available rooms
Route::get('/', function () {
    $rooms = App\Models\Room::where('is_available', true)->get();
    return view('pages.home', compact('rooms'));
});

// Rooms Page - Show all available rooms
Route::get('/rooms', function () {
    $rooms = App\Models\Room::all();
    return view('pages.rooms', compact('rooms'));
});

// Search Rooms (AJAX) - Must be before /rooms/{id} route
Route::get('/rooms/search', [RoomController::class, 'search'])->name('rooms.search');

// Individual Room Detail Page
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');

// Contact Page
Route::get('/contact', function () {
    return view('pages.contact');
});

// Booking Page
Route::get('/booking', function () {
    return view('pages.booking');
});

// Thank You Page
Route::get('/thank-you', function () {
    return view('pages.thankyou');
});


// ADMIN ROUTES - CRUD OPERATIONS


// Admin Dashboard - Redirect to rooms management
Route::get('/admin', function () {
    return redirect()->route('admin.rooms.index');
});

Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
Route::put('/admin/rooms/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
Route::delete('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');