<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    private $tags = [];
    private $productCode;
    private $productName;
    private $categoryID;

    public function setProductCode($code) {
        $this->productCode = $code;
    }

    public function setProductName($name) {
        $this->productName= $name;
    }

    public function setCategory($categoryID) {
        $this->categoryID = $categoryID;
    }

    public function setTags($inputTags) {
        array_push($this->tags, $inputTags);
    }

    public function addProduct() {
        if ($this->checkExists($this->productCode, $this->productName)) {
            DB::insert('insert into product (product_id, product_name, category_id) values (?,?,?)', [$this->productCode, $this->productName, $this->categoryID]);

            if(count($this->tags) > 0) {
                foreach($this->tags as $tag) {
                    DB::insert('insert into products_tag_pivot (product_id, tag_id) values (?,?)', [$this->productCode, $tag]);
                }
            }
        }
    }

    public function getAllProductInfo() {
        $allProducts = DB::select("SELECT p.*, c.category_name, GROUP_CONCAT(t.tag_name) AS tags
        FROM product p
        JOIN category c ON p.category_id = c.category_id
        LEFT JOIN products_tag_pivot pt ON p.product_id = pt.product_id
        LEFT JOIN tag t ON pt.tag_id = t.tag_id
        GROUP BY p.product_id, p.product_name, p.category_id, c.category_name");

        return $allProducts;
    }

    public function getOneProductInfo() {
        $product = DB::select("SELECT p.*, c.category_name, GROUP_CONCAT(t.tag_name) AS tags
        FROM product p
        JOIN category c ON p.category_id = c.category_id
        LEFT JOIN products_tag_pivot pt ON p.product_id = pt.product_id
        LEFT JOIN tag t ON pt.tag_id = t.tag_id
        WHERE p.product_id = (?)
        GROUP BY p.product_id, p.product_name, p.category_id, c.category_name", [$this->productCode]);

        return $product;
    }

    public function getOneProductInfoByName($productName) {
        $product = DB::select("SELECT p.*, c.category_name, GROUP_CONCAT(t.tag_name) AS tags
        FROM product p
        JOIN category c ON p.category_id = c.category_id
        LEFT JOIN products_tag_pivot pt ON p.product_id = pt.product_id
        LEFT JOIN tag t ON pt.tag_id = t.tag_id
        WHERE LOWER(p.product_name) LIKE (?)
        GROUP BY p.product_id, p.product_name, p.category_id, c.category_name", ["%" . strtolower($productName) . "%"]);

        return $product;
    }

    public function deleteProduct($productID) {
        DB::delete("DELETE FROM product WHERE product_id = (?)", [$productID]);
    }

    private function checkExists($productCode, $productName) {
        $productName = DB::select('select product_id from product where product_name = (?)', ["$productName"]);
        $productCode = DB::select('select product_id from product where product_id = (?)', ["$productCode"]);

        if (empty($productName) && empty($productCode)) {
            return true;
        } else {
            return false;
        }
    }

}
