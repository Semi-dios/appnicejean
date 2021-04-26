<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AuthController extends Controller
{

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
          return response([
            'message'=> ['These credentials do not match our records']
          ], 404);
        }


        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
          'user'=>$user,
          'token'=>$token
        ];

        return response($response, 201);

    }

    public function register(Request $request){


        $validator= Validator::make( $request->all(),[
            'name'=>'required'|'string'|'max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);




        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],401);
        }

        $user= $request->all();
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);
        $accessToken = $user->createToken('MyApp')->accessToken;



        $success['name'] = $user->name;
        $user['api_token']=Str::random(40);
        return response()->json(['success'=>$user, 'access_token'=>$accessToken]);

    }

    public function userDetail(Request $request){
        $user = Auth::user();
        return response()->json(['user'=>$user],200);
    }
    public function logout(){
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out successfully', 200);

    }


}
