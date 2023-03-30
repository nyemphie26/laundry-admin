<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function update(Request $request, $email)
    {
        try {
            //code...
            $user = User::where('email',$email)->firstOrFail();
            $user->update($request->all());
            return response()->json(["data" => new UserResource($user)]);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()],500);
        }
    }
}
