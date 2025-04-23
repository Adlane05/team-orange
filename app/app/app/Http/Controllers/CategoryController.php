<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public static function addCategory(Request $request) {
        $data = self::verifyData($request);
        
        $categoryName = e($data["category"]);
        
        $category = new Category();
        $category->__constructWithParams($categoryName);
        $category->addCategory(); // DOES NOT CHECK IF CATEGORY NAME IS UNIQUE
    }

    private static function verifyData(Request $request) {
        $validatedData = $request->validate(
            [
            "category" => ["required"],
            ],
            [
                "category.required" => "Category name cannot be empty",
            ]
        );

        return $validatedData;
    }

    public static function getData() {
        $category = new Category();
        $categories = $category->getAllCategory();

        return $categories;
    }

    public static function getCategoryID($categoryName) {
        $category = new Category();
        $category->__constructWithParams($categoryName);
        return $category->getCategoryID();
    }


}
