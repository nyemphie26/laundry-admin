<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //validation
        $request->validate([
            'provider_id' => 'required',
            'provider_name' => 'required',
            'device_name' => 'required',
        ]);
        // check linked account first
        $user = SocialAccount::where('provider_id', $request->provider_id)->where('provider_name',$request->provider_name)->first();
        // $user = User::where('email', $request->email)->first();
        //if no
        //return no linked account
        if (!$user) {
            return response()->json([
                'message'=>'The provided credentials are incorrect.'
            ],422);
            throw ValidationException::withMessages([
                'provider_id' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        if (!$user->user->hasRole('user')) {
            return response()->json([
                'message'=>'You have no permission to logging in'
            ],422);
        }
        
        $token = $user->user->createToken($request->device_name)->plainTextToken;

        return response()->json(['profile'=> new UserResource($user->user), 'token' => $token],200);
        
    }
    
    public function regularLogin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('user')) {
                $token = Auth::user()->createToken('regular_login')->plainTextToken;
                return response()->json(['profile'=> new UserResource(Auth::user()), 'token' => $token],200);
            }            
        }

        return response()->json([
            'message'=>'The provided credentials are incorrect.',
        ],422);
    }
    
    public function register(Request $request)
    {
        //create user and social account w/ provider
        // Validate request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => 'required|string|email|unique:users',
        ]);
        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }
        
        if ($validator->passes()) {
            // return response()->json([
            //     'message'=>'Stored User'
            // ],200);
            try {
                DB::beginTransaction();
                $user = new User();
                $user->name         = $request->first_name;
                $user->last_name    = $request->last_name;
                $user->email        = $request->email;
                $user->avatar_path  = $request->picture;
                $user->phone        = $request->phone;
                $user->password     = bcrypt($request->password);
                $user->save();

                if(isset($request->provider_id)){
                    $linkedAccount = new SocialAccount();
                    $linkedAccount->provider_id     = $request->provider_id;
                    $linkedAccount->provider_name   = $request->provider_name;
                    $linkedAccount->user_id         = $user->id;
                    $linkedAccount->save();
                };

                $user->assignRole('user');

                $token = $user->createToken($request->device_name)->plainTextToken;
                DB::commit();
                // return $token;

                return response()->json(['profile'=> new UserResource($user), 'token' => $token],200);
            } catch (\Throwable $th) {
                DB::rollBack();
    
                return response()->json(['message'=>$th->getMessage()],500);
            }
        }
        //then produce token
    }

    public function resetPassword(Request $request){


        // $valid = $request->validate(['email' => 'required|email|exists:users']);
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'=>$validator->errors()
            ], 406);
        }
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? response()->json(['status' => __($status), 200])
                    : response()->json(['email' => __($status), 404]);
                    // : back()->withErrors(['email' => __($status)]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user->tokens()->where('id', $tokenId)->delete();
        auth()->user()->tokens()->delete();
        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
