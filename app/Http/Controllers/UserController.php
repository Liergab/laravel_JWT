<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function(){
        public function public(Request $request, User $user){
            $validate = $request->validate([
                'name' => 'sometimes|string',
                'email' => 'sometimes|email'
            ]);

            $user->update($validate);

            return UserResource($user);
        }
    }
}
