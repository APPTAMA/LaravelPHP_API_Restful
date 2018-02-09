<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UsersController extends Controller
{
    function  index(Request $request)
    {

        if($request->isJson()){
             //  Eloquent
            $users = User::all();

            return response()->json($users,200);
        }

        return response()->json( ['error' => 'no autorizado'] ,401,[]);
    }

    function createUser(Request $request){

         if($request->isJson()){
             //  Eloquent            
            // TODO: CREATE USER
            $data = $request->json()->all();
            $user = User::create([
                'name' =>  $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'api_token' => str_random(60)
            ]);

            return response()->json($user,201);
        }

        return response()->json( ['error' => 'no autorizado'] ,401,[]);
    }

    function getToken(Request $request){

         if($request->isJson()){
            try{
                $data = $request->json()->all();

                $user = User::where('username',$data['username'])->first();

                if($user && Hash::check($data['password'],$user->password)) {
                    return response()->json($user,200);
                }
                else{
                    return response()->json(['error' => 'No content data'],406);
                }

            }catch(ModelNotFoundException $e){
                return response()->json(['error' => 'No content error'],406);
            }

         }

         return response()->json( ['error' => 'no autorizado'] ,401,[]);

    }



}
