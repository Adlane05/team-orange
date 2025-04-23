<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;


class ProductController extends Controller
{

    public static function addProduct(Request $request) {
        $data = self::validateData($request);
        $tagIDS = [];

        if (isset($data["tag"])) {
            foreach($data["tag"] as $tag) {
                array_push($tagIDS, $tag);
            }
        }


        $product = new Product();
        $product->setProductCode($data["productCode"]);
        $product->setProductName($data["productName"]);
        $product->setCategory($data["category"]);
        if(count($tagIDS) > 0) {
            foreach($tagIDS as $tagID) {
                $product->setTags($tagID);
            }
        }
        $product->addProduct();
    }

    private static function validateData(Request $request) {
        $validatedData = $request->validate([
            "productName" => ["required"],
            "category" => ["required"],
            "productCode" => ["required"],
            "tag" => ["array"],
            "tag.*" => ["distinct"]
        ],
        [
            "productName.required" => "Product Name cannot be empty",
            "category.required" => "Category cannot be empty",
            "productCode.required" => "Product Code cannot be empty",
            "tag.*.distinct" => "Tags must be unique"
        ]);
        return $validatedData;
    }

    public static function getProducts() {
        $productObject = new Product();
        $products = $productObject->getAllProductInfo();
        return $products;
    }
}
