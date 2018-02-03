<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

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
            return response()->json([],200);
        }

        return response()->json( ['error' => 'no autorizado'] ,401,[]);
    }

}
