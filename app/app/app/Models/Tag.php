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
        if (isset($this->tagName) && !($this->checkExists($this->tag_name))) {
            DB::insert('insert into tag (tag_name) values (?)', [$this->tagName]);
        }
    }

    public function deleteTag($tagID) {
        DB::delete("DELETE FROM tag WHERE tag_id = (?)", [$tagID]);
    }

    public function getTagID() {
        $tagID = DB::select("SELECT tag_id FROM tag WHERE tag_name = (?)", [$this->tagName])[0]->tag_id;
        return $tagID;
    }

    public function getAllTag() {
        return DB::select('select tag_id, tag_name from tag');
    }

    public function getOneTag($tagID) {
        $tag = DB::select('select tag_id, tag_name from tag where tag_id = (?)', ["$tagID"]);
        return $tag;
    }

    private function checkExists($tagName) {
        $tag = DB::select('select tag_id from tag where tag_name = (?)', ["$tagName"]);
        return empty($tag);
    }
}
