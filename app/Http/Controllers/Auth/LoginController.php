<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "title" => "Log In"
        ];
        return view("auth.login",$data);
    }

    public function process(Request $request)
    {
        //return invalid form validation
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only("email","password");
        //successfully logged in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to(RouteServiceProvider::HOME);
        }
        
        else
            return back();

    }
}
