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
        DB::insert('insert into product (product_id, product_name, category_id) values (?,?,?)', [$this->productCode, $this->productName, $this->categoryID]);

        if(count($this->tags) > 0) {
            foreach($this->tags as $tag) {
                DB::insert('insert into products_tag_pivot (product_id, tag_id) values (?,?)', [$this->productCode, $tag]);
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

}
