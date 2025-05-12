<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    private static function verifyData(Request $request) {
        $validatedData = $request->validate(
            [
            "tag" => ["required"],
            ],
            [
                "tag.required" => "Tag name cannot be empty",
            ]
        );
       return $validatedData;
    }

    public static function addTag(Request $request) {
        $data = self::verifyData($request);

        $tag = new Tag();
        $tag->__constructWithParams(reset($data));
        $tag->addTag();
    }

    public static function getData() {
        $tag = new Tag();
        $tags = $tag->getAllTag();

        return $tags;
    }

    public static function getTagID($tagName) {
        $tag = new Tag();
        $tag->__constructWithParams($tagName);
        return $tag->getTagID();
    }
    
    public static function deleteTag($tagID) {
        $tag = new Tag();
        $tag->deleteTag($tagID);
    }

    public static function getOneTag($tag) {
        $tagID = e($tag);
        $tag = new Tag();
        return $tag->getOneTag($tagID)[0];
    }
}
