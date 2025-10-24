<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/rooms', function () {
    return view('pages.rooms');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/booking', function () {
    return view('pages.booking');
});