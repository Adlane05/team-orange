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

        $tagName = e($data["tag"]);
        
        $tag = new Tag();
        $tag->__constructWithParams($tagName);
        $tag->addTag(); // DOES NOT CHECK IF CATEGORY NAME IS UNIQUE
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
}
