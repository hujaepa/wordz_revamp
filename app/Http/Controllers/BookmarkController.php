<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
class BookmarkController extends Controller
{
    public function add(Request $request)
    {
        $input = $request->all();
        $bookmark = Bookmark::create([
            "word" => $input['word'],
            "added_by" => Auth::user()->id
        ]);

        return response()->json([
            "status" => true,
            'message' => "Successfully bookmark the word"
        ]);
    }

    public function list($user_id)
    {
       $words = Bookmark::where("added_by","=",$user_id)->orderby("created_at","desc")->get();
       $data = [
        "active"=>"bookmark",
        "icon"=>"<i class='fas fa-bookmark'></i>",
        "title"=>"Bookmark",
        "words" => $words,"user_id" => $user_id
       ];
       return view("bookmark",$data);
    }
}
