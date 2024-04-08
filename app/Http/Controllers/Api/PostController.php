<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post();

        $tags = [];
        $tagsArr = explode(',', $request->tag_id);
        
        foreach($tagsArr as $tag_id) {
            array_push($tags, (string) $tag_id);
        }

        $post->tag_id = $tags;
        $post->title = $request->title;
        $post->description = $request->description;

        // Save the post to the database
        $post->save();

        return response()->json(['success' => 'Successfully Added a Post'], 200);
    }
}
