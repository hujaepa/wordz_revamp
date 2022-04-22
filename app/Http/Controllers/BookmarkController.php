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

    public function list($userId)
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

    public function view($keyword)
    {
        //fetch the word from google API
        $status='';
        $error='';
        $url = 'https://api.dictionaryapi.dev/api/v2/entries/en_US';
        
        $request_url = $url . '/' . $keyword;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);//ignore ssl url
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($curl);
        if(!curl_exec($curl)) {
            $status=false;
            $error='Curl error: ' . curl_error($curl);
        } else {
            curl_close($curl);
            $data = [
                "icon"=>"<i class='fas fa-info-circle'></i>",
                "title"=>"Definitions",
                "result" => json_decode($response)
            ];
            $result=json_decode($response);
        }
        return view("view",$data);
    }
}
