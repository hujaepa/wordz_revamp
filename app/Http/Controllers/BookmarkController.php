<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
class BookmarkController extends Controller
{
    public function add(Request $request)
    {
        $input = $request->all();
        $bookmark = Bookmark::create([
            "word" => $input['word']
        ]);

        return response()->json([
            "status" => true,
            'message' => "Successfully bookmark the word"
        ]);
    }

    public function list()
    {
        echo "test";
    }
}
