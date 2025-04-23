<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public static function verifyData(Request $request) {
        $validatedData = $request->validate(
            [
            "category" => ["required"],
            ],
            [
                "category.required" => "Category name cannot be empty",
            ]
        );

        $categoryName = e($validatedData["category"]);
        
        $category = new Category();
        $category->__constructWithParams($categoryName);
        $category->addCategory(); // DOES NOT CHECK IF CATEGORY NAME IS UNIQUE

    }

    public static function getData() {
        $category = new Category();
        $categories = $category->getAllCategory();

        return $categories;
    }


}
