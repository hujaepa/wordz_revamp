<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
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
    public function success()
    {
        $data =[
            "title" => "Success Register"
        ];
        return view('auth.success',$data);
    }
    public function process(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|confirmed",
            "password_confirmation" => "required|min:8"
        ]);

        if(!$validator->passes())
            return response()->json(['error'=>$validator->errors()]);
            
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->save();
        return response()->json(['status'=>"success","message" => "You have successsfully registered. You can now proceed to login"]);
    }
}
