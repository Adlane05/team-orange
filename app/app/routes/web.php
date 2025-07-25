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
    ->where("role", "manager")
    ->where("employee_id", $input_name)
    ->where("password_hash", hash("sha256", $input_password))
    ->first();

    echo $input_name ."<br>";
    echo $employee->role ."<br>";
    echo $employee->employee_id ."<br>";
    echo $employee->password_hash ."<br>";
    echo $input_password ."<br>";
    echo hash("SHA256", $input_password) ."<br>";

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

Route::get('/managers/search/tags', function () {
    $tagInfo = TagController::getData();
    return view('managersSearchTags', ["tagInfo" => $tagInfo]);
});

Route::post('/managers/search/tags', function (Request $request) {
    if(isset($request->delete)) {
        TagController::deleteTag($request->delete);
        return redirect()->to("managers/search/tags");
    } else if (isset($request->update)) {
        return redirect()->route('updateTags')->with("tag_id", $request->update);
    } else {
        $tagInfo = TagController::getData();
        return view('managersSearchTags', ["tagInfo" => $tagInfo]);
    }
});

Route::get('/managers/create/products', function () {
    $categories = CategoryController::getData();
    $tags = TagController::getData();
    $productAdded = False;
    return view('addProducts', ["categories" => $categories, "tags" => $tags, "productAdded" => $productAdded]);
});

Route::post('/managers/create/products', function (Request $request) {
    $categories = CategoryController::getData();
    $tags = TagController::getData();
    $productAdded = True;

    ProductController::addProduct($request);

    return view('addProducts', ["categories" => $categories, "tags" => $tags, "productAdded" => $productAdded]);
});

Route::get('/managers/create/tags', function () {
    $tagAdded = False;
    return view('addTags', ["tagAdded" => $tagAdded]);
});

Route::post('/managers/create/tags', function (Request $request) {
    TagController::addTag($request);
    $tagAdded = True;
    return view('addTags', ["tagAdded" => $tagAdded]);
});

Route::get('/managers/update/tags', function() {
    $tag = TagController::getOneTag(session("tag_id"));
    return view('updateTags', ["tag" => $tag]);
})->name("updateTags");

Route::post('/managers/update/tags', function(Request $request) {
    if(isset($request->originalTagCode)) {
        TagController::deleteTag($request->originalTagCode);
        TagController::addTag($request);
        return redirect()->to("managers/search/tags");
    } else {
    return view('updateTags');
    }
});

Route::get('/managers/search/categories', function () {
    $categoryInfo = CategoryController::getData();
    return view('managersSearchCategories', ["categoryInfo" => $categoryInfo]);
});

Route::Post('/managers/search/categories', function (Request $request) {
    if(isset($request->delete)) {
        CategoryController::deleteCategory($request->delete);
        return redirect()->to("managers/search/categories");
    } else if (isset($request->update)) {
        return redirect()->route('updateCategories')->with("category_id", $request->update);
    } else {
        $categoryInfo = CategoryController::getData();
        return view('managersSearchCategories', ["categoryInfo" => $categoryInfo]);
    }
});

Route::get('/managers/create/categories', function () {
    $categoryAdded = False;
    return view('addCategories', ["categoryAdded" => $categoryAdded]);
});

Route::post('/managers/create/categories', function (Request $request) {
    $categoryAdded = True;
    CategoryController::addCategory($request);
    return view('addCategories', ["categoryAdded" => $categoryAdded]);
});

Route::get('/managers/update/categories', function() {
    $category = CategoryController::getOneCategory(session("category_id"));
    return view('updateCategories', ["category" => $category]);
})->name("updateCategories");

Route::post('/managers/update/categories', function(Request $request) {
    if(isset($request->originalCategoryCode)) {
        CategoryController::deleteCategory($request->originalCategoryCode);
        CategoryController::addCategory($request);
        return redirect()->to("managers/search/categories");
    } else {
    return view('updateCategories');
    }
});

Route::get('/managers/search/employees', function () {
    $employeeInfo = EmployeesController::getAllEmployees();
    return view('managersSearchEmployees', ["employeeInfo" => $employeeInfo]);
});

Route::post('/managers/search/employees', function (Request $request) {
    if(isset($request->delete)) {
        EmployeesController::deleteEmployee($request->delete);
        return redirect()->to("managers/search/employees");
    } else if (isset($request->update)) {
        return redirect()->route('updateEmployees')->with("employee_id", $request->update);
    } else {
        $employeeInfo = EmployeesController::getAllEmployees();
        return view('managersSearchEmployees', ["employeeInfo" => $employeeInfo]);
    }
});


Route::get('/managers/update/employees', function() {
    $employee = EmployeesController::getOneEmployee(session("employee_id"));
    return view('updateEmployees', ["employee" => $employee]);
})->name("updateEmployees");

Route::post('/managers/update/employees', function(Request $request) {
    if(isset($request->originalEmployeeCode)) {
        EmployeesController::deleteEmployee($request->originalEmployeeCode);
        EmployeesController::addEmployee($request);
        return redirect()->to("managers/search/employees");
    } else {
    return view('updateEmployees');
    }
});

Route::get('/managers/create/employees', function () {
    $userAdded = False;
    return view('addEmployees', ["userAdded" => $userAdded]);
});

Route::post('/managers/create/employees', function (Request $request) {
    EmployeesController::addEmployee($request);
    $userAdded = True;
    return view('addEmployees', ["userAdded" => $userAdded]);
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