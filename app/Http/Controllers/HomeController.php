<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
       return view("home");
   }
   
   public function logout()
   {
       Auth::logout();
       return redirect()->route('login');
   }

   public function search(Request $request)
    {
        $url = 'https://api.dictionaryapi.dev/api/v2/entries/en_US';
        $keyword = $request->input('search');
        
        $request_url = $url . '/' . $keyword;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);//ignore ssl url
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($curl);
        if(!curl_exec($curl)) {
            $info["status"]=false;
            $info["curl_error"]='Curl error: ' . curl_error($curl);
        }
        else {
            curl_close($curl);
            $result=json_decode($response);
        }
        return view('home',["result"=>$result,"keyword"=>$keyword]);
    }
}
