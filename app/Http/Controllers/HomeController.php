<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Bookmark;
class HomeController extends Controller
{
   public function index()
   {
       $data = [
           "icon"=>"<i class='fas fa-search'></i>",
           "title"=>"Search",
           "active"=>"search"
       ];
       return view("home",$data);
   }
   
   public function logout()
   {
       Auth::logout();
       return redirect()->route('login');
   }

   public function search(Request $request)
    {
        //fetch the word from google API
        $status='';
        $error='';
        $url = 'https://api.dictionaryapi.dev/api/v2/entries/en_US';
        $keyword = $request->input('search');
        
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
            $result=json_decode($response);
        }

        //check if word already bookmarked
        $chcBookmark = Bookmark::where("word",$request->input('search'))->count();
        $data = [
            "icon"=>"<i class='fas fa-search'></i>",
            "title"=>"Search",
            "status"=>$status,
            "error"=>$error,
            "chcBookmark"=>$chcBookmark,
            "result"=>$result,
            "keyword"=>$keyword
        ];
        return view('home',$data);
    }
}
