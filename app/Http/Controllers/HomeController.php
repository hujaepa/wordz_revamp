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

   public function test()
   {
       echo "test";
   }
}
