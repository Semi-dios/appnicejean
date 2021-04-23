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
        $http = new \GuzzleHttp\Client;


        try {
            $response = $http->post(config('services.passport,login_endpoint'),[
                'form_params'=> [
                    'grant_type'=>'password',
                    'client_id' =>config('services.passport.client_id'),
                    'client_secret' =>config('services.passport.client_secret'),
                    'username'=>$request->username,
                    'password'=>$request->password,
                ]
            ]);

            return $response->getBody();
        }catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password', $e->getCode());
            }else if($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect . Please try again', $e->getCode());

            }
            return response()->json('Something went wrong on the server', $e->getCode());


        }


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

    public function userDetail(){
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
