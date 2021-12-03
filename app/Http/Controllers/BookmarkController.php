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

    public function list()
    {
       $total = Bookmark::where("added_by","=",Auth::user()->id)->count();
       $words = Bookmark::where("added_by","=",Auth::user()->id)->orderby("created_at","desc")->paginate(10);
       $data = [
        "active"=>"bookmark",
        "icon"=>"<i class='fas fa-bookmark'></i>",
        "title"=>"Bookmark",
        "total" => $total,
        "words" => $words
       ];
       return view("bookmark",$data);
    }
}
