<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/login/employees')->send();
});

Route::get('/login', function () {
    return redirect()->to('/login/employees')->send();
});

Route::get('/login/employees', function () {
    return view('login');
});

Route::post('/login/employees', function () {
    return view('login');
});

Route::get('/login/managers', function () {
    return view('managerLogin');
});
