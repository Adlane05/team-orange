<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->to('/login/employees')->send();
});
Route::get('/login', function () {
    return redirect()->to('/login/employees')->send();
});


Route::get('/login/employees', function () {
    return view('employeeLogin');
});
Route::post('/login/employees', function (Request $request) {

    $input_name = $request->input("username");
    $employee = DB::table("employees")->where("employee_id", $input_name)->first();
    if (isset($employee)) {
        return redirect()->to('/login/employees')->send();  // MAKE THIS REDIRECT TO THE MAIN PAGE WHEN FINISHED
    } else {
    return view('employeeLogin');
    }
});


Route::get('/login/managers', function () {
    return view('managerLogin');
});
Route::post('/login/managers', function () {
    return view('managerLogin');
});

