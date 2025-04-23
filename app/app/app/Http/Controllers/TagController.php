<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public static function verifyData(Request $request) {
        $validatedData = $request->validate(
            [
            "tag" => ["required"],
            ],
            [
                "tag.required" => "Tag name cannot be empty",
            ]
        );

        $tagName = e($validatedData["tag"]);
        
        $tag = new Tag();
        $tag->__constructWithParams($tagName);
        $tag->addTag(); // DOES NOT CHECK IF CATEGORY NAME IS UNIQUE

    }

    public static function getData() {
        $tag = new Tag();
        $tags = $tag->getAllTag();

        return $tags;
    }

}
