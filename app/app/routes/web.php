<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return redirect()->to('/employees/login')->send();
});
Route::get('/login', function () {
    return redirect()->to('/employees/login')->send();
});


Route::get('/employees/login', function () {
    return view('employeeLogin');
});
Route::post('/employees/login', function (Request $request) {
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
        return redirect()->to('/employees/search')->send();
    } else {
    return redirect()->back()->with("failed", "ID is incorrect");
    }
});


Route::get('/managers/login', function () {
    return view('managerLogin');
});
Route::post('/managers/login', function (Request $request) {
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

    $employee = DB::table("employees")
    ->where("role", "supervisor")
    ->where("employee_id", $input_name)
    ->where("password_hash", $input_password)
    ->first(); // DOES NOT USE HASHING TO CHECK PASSWORD

    if (isset($employee)) {
        return redirect()->to('managers/search')->send();
    } else {
        return redirect()->back()->with("failed", "Username or Password is incorrect");
    }
});

Route::get('/employees/search', function () {
    return view('employeeSearch');
});

Route::get('/managers/search', function () {
    return view('managerSearch');
});

Route::get('/managers/create/products', function () {
    $categories = CategoryController::getData();
    $tags = TagController::getData();
    return view('addProducts', ["categories" => $categories, "tags" => $tags]);
    // MAKE SURE THAT THE VIEW WILL HAVE A UNIQUE CONSTRAINT FOR THE TAGS
    // SO THAT DUPLICATE TAGS AREN'T ASSIGNED TO PRODUCTS
});

Route::get('/managers/create/others', function () {
    return view('addOthers');
});

Route::post('/managers/create/others', function (Request $request) {
    if (isset($request['username'])) {
        echo "Username added";
    } else if (isset($request['category'])) {
        CategoryController::verifyData($request);
    } else if (isset($request['tag'])) {
        TagController::verifyData($request);
    }
    
    return view('addOthers');
});