<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(),[
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|min:8|confirmed"
        ]);
        return response()->json(['error'=>$validator->errors()]);
    }
}
