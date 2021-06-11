<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{

    public function login(Request $request)
    {
       $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
          return response([
            'message'=> ['These credentials do not match our records']
          ], 401);
        }


        $token = $user->createToken('my-app-token')->accessToken;

        $response = [
          'user'=>$user,
          'token'=>$token
        ];
        return response()->json([$response,
            'message' => 'Logueo Exitoso',
            200
        ]);


    }

    public function register(Request $request){


        $validator= Validator::make( $request->all(),[
            'username'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'roles'=>'required'
        ]);




        if($validator->fails()){
            return response()->json(['error'=>$validator->errors(),'message' => 'Error al crear el usuario !'],401);
        }

        $user= $request->all();
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);
        $user->assignRole($request->input('roles'));
        $accessToken = $user->createToken('MyApp')->accessToken;



        $success['username'] = $user->username;
        $user['api_token']=Str::random(40);
        return response()->json(['success'=>$user, 'access_token'=>$accessToken,'message' => 'Usuario Creado!'],
        201);

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
