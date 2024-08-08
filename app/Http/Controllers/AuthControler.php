<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $data=$request->validate([
            'email'=> 'required|email|string',
            'password'=>'required|string|min:8'
        ]);
        $user=user::where('email',$data['email'])->first();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            if($user["is_admin"]){
                $token=$user->createToken($user->name .'-authtoken')->plainTextToken;
                return response()->json([
                    "token"=>$token,
                    "is_admin"=>true
                ]);
            }
            $token=$user->createToken($user->name .'-authtoken')->plainTextToken;
            return response()->json([
                "token"=>$token
            ]);
        }else{
            return response()->json([
                "masseg"=>"no .,/"
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function regster(Request $request,User $user)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'email'=> 'required|email|string|unique:users',
            'password'=>'required|string|min:8'
        ]);

        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=Hash::make($data['password']);
        $user->save();
        return response()->json([
            "masseg"=>"welcom"
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request,User $user)
    {
        $user->tokens()->delete();
            return response()->json([
                "massage"=>"logout"
            ],200);
    }

}
