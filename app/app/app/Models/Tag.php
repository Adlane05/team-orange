<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $fillable = ["tag_name"];
    protected $table = "tag";

    private $tagName;
    

    public function __construct() {
    }

    public function __constructWithParams($tagName) {
        $this->__construct();
        $this->tagName = $tagName;
    }

    public function addTag() {
        if (isset($this->tagName)) {
            DB::insert('insert into tag (tag_name) values (?)', [$this->tagName]);
        }   // MAKE SURE THIS CAN HANDLE UNIQUE CONSTRAINTS
    }

    public function deleteTag() {
        
    }

    public function updateTag() {

    }

    public function getTagID() {
        $tagID = DB::select("SELECT tag_id FROM tag WHERE tag_name = (?)", [$this->tagName])[0]->tag_id;
        return $tagID;
    }

    public function getAllTag() {
        return DB::select('select * from tag');
    }

}
