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

    $validatedData = $request->validate(
        [
        "username" => ["required"],
        ],
        [
            "username.required" => "ID cannot be empty"
        ]
    );


    $input_name = $validatedData['username'];
    $employee = DB::table("employees")->where("employee_id", $input_name)->first();
    if (isset($employee)) {
        return redirect()->to('/search')->send();
    } else {
    return redirect()->back()->with("failed", "ID is incorrect");
    }
});


Route::get('/login/managers', function () {
    return view('managerLogin');
});
Route::post('/login/managers', function (Request $request) {

    $validatedData = $request->validate(
        [
        "username" => ["required"],
        "password" => ["required"]
        ],
        [
            "username.required" => "Username cannot be empty",
            "password.required" => "Password cannot be empty"
        ]
    );

    $input_name = $validatedData["username"];
    $input_password = e($validatedData["password"]);

    $employee = DB::table("employees")->where("role", "supervisor")->where("employee_id", $input_name)->where("password_hash", $input_password)->first(); // DOES NOT USE HASHING TO CHECK PASSWORD
    if (isset($employee)) {
        return redirect()->to('/search')->send();  // MAKE THIS REDIRECT TO THE MAIN PAGE WHEN FINISHED
    } else {
        return redirect()->back()->with("failed", "Username or Password is incorrect");
    }
});

