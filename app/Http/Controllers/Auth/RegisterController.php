<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            "title" => "Register"
        ];
        return view('auth.register',$data);
    }
    public function process(Request $request)
    {
        # code...
    }
}
