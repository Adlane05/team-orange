<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeesController;

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
    // MAKE A NEW CLASS FOR EMPLOYEES SO THAT THIS DOESN'T HAPPEN HERE

    if (isset($employee)) {
        return redirect()->to('managers/search')->send();
    } else {
        return redirect()->back()->with("failed", "Username or Password is incorrect");
    }
});

Route::get('/employees/search', function () {
    $productInfo = ProductController::getProducts();
    return view('employeeSearch', ["productInfo" => $productInfo]);
});

Route::get('/managers/search', function () {
    $productInfo = ProductController::getProducts();
    return view('managerSearch', ["productInfo" => $productInfo]);
});

Route::post('/managers/search', function (Request $request) {
    if(isset($request->delete)) {
        ProductController::deleteProduct(e($request->delete));
        return redirect()->to("managers/search");
    } else if (isset($request->update)) {
        return redirect()->route('update')->with("product_id", $request->update);
    } else {
        $productInfo = ProductController::getProducts();
        return view('managerSearch', ["productInfo" => $productInfo]);
    }
});

Route::get('/managers/create/products', function () {
    $categories = CategoryController::getData();
    $tags = TagController::getData();
    return view('addProducts', ["categories" => $categories, "tags" => $tags]);
});

Route::post('/managers/create/products', function (Request $request) {
    $categories = CategoryController::getData();
    $tags = TagController::getData();

    ProductController::addProduct($request);

    return view('addProducts', ["categories" => $categories, "tags" => $tags]);
});

Route::get('/managers/create/others', function () {
    return view('addOthers');
});

Route::post('/managers/create/others', function (Request $request) {
    if (isset($request['username'])) {
        EmployeesController::addEmployee($request);
    } else if (isset($request['category'])) {
        CategoryController::addCategory($request);
    } else if (isset($request['tag'])) {
        TagController::addTag($request);
    }
    
    return view('addOthers');
});

Route::get('/managers/update', function () {
    $categories = CategoryController::getData();
    $tags = TagController::getData();

    $productInfo = ProductController::getOneProduct(session("product_id"));

    return view('updateProducts', ["categories" => $categories, "tags" => $tags, "product" => $productInfo[0]]);
})->name("update");

Route::post('/managers/update', function (Request $request) {
    ProductController::deleteProduct(e($request->originalProductCode));
    ProductController::addProduct($request);

    // THIS SHOULD BE A TEMPORARY SOLUTION
    // IT'S PROBABLY BETTER TO UPDATE THE DATABASE LATER SO THAT
    // THE PRODUCT CODE IS NOT THE PRIMARY KEY OF THE PRODUCT TABLE.
    // MAKE A NEW COLUMN FOR THE CODE SO THAT IT CAN BE UPDATED PROPERLY
    return redirect()->to("managers/search");
})->name("update");