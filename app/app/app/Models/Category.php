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
        }   // MAKE SURE THIS CAN HANDLE UNIQUE CONSTRAINTS
    }

    public function deleteCategory() {
        
    }

    public function updateCategory() {

    }

    public function getCategory() {

    }

    public function getAllCategory() {
        return DB::select('select * from category');
    }


}
