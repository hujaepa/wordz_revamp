<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
       echo "<a href='/logout'>Test</a>";
   }
   public function logout()
   {
       Auth::logout();
       return redirect()->route('login');
   }
}
