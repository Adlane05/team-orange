<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    protected $fillable = ["category_name"];
    protected $table = "category";

    private $categoryName;
    

    public function __construct() {
    }

    public function __constructWithParams($categoryName) {
        $this->__construct();
        $this->categoryName = $categoryName;
    }

    public function addCategory() {
        if (isset($this->categoryName)) {
            DB::insert('insert into category (category_name) values (?)', [$this->categoryName]);
        }
    }

    public function deleteCategory() {
        
    }

    public function updateCategory() {

    }

    public function getCategory() {
        $categoryID = DB::select("SELECT category_id FROM category WHERE category_name = (?)", [$this->category_name])[0]->category_id;
        return $categoryID;
    }

    public function getAllCategory() {
        return DB::select('select category_id, category_name from category');
    }


}
