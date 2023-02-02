<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        // return Auth::user();
        return view('Pages.Account.settings');
    }

    public function employee(){
        $employees = User::role(['admin','driver','employee'])->get();
        // return $employees;
        return view('Pages.Users.employees', compact('employees'));
    }

    public function createEmployee(){
        $roles = Role::whereNotIn('name', ['user'])->pluck('name');
        return view('Pages.Users.employees-new', compact('roles'));
    }

    public function storeEmployee(Request $request){
        
        $validated = $request->validate([
            'name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'role' => 'required',
            'phone' => 'required|numeric|max_digits:25',
            'email' => 'required|string|email|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => 'image|file'
        ]);
        // return $validated['avatar']->store('avatars');

        DB::transaction(function() use ($validated){
            if(isset($validated['avatar'])){
                $validated['avatar_path'] = $validated['avatar']->store('avatars');
            }
            else{
                $validated['avatar_path'] = 'assets/img/avatar.png';
            }
            
            $user = User::create([
                'name' => $validated['name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'avatar_path' => $validated['avatar_path'],
            ]);
    
            $user->assignRole($validated['role']);


        });

        $redirect = redirect()->route("users.employees");

        return $redirect->with([
            'message'    => "Employee has been added",
            'success' => true,
        ]);
    }

    public function editEmployee(User $user)
    {
        $roles = Role::whereNotIn('name', ['user'])->pluck('name');
        $edit = true;
        return view('Pages.Users.employees-new', compact('user', 'edit', 'roles'));
    }

    public function updateEmployee(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'phone' => 'required|numeric|max_digits:25',
        ];

        //check email
        if($request->email != $user->email)
        {
            $rules['email'] = 'required|string|email|unique:users';
        }

        //check password
        if (isset($request->password)) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        //check avatar
        if($request->file('avatar'))
        {
            $rules['avatar'] = 'image|file';
        }
        
        //check role
        if (isset($request->role)) {
            $user->syncRoles($request->role);
        }
        
        $validated = $request->validate($rules);
        // return $validated;


        DB::transaction(function() use ($validated, $user){
            
            $user->name = $validated['name'];
            $user->last_name = $validated['last_name'];
            $user->phone = $validated['phone'];
            
            if(isset($validated['email'])){
                $user->email = $validated['email'];
            }

            if(isset($validated['password'])){
                $user->password = Hash::make($validated['password']);
            }

            if(isset($validated['avatar'])){
                $user->avatar_path = $validated['avatar']->store('avatars');
            }
            $user->save();
            // User::where('id',$user->id)->update($validated);

        });

        $redirect = redirect()->route("users.employees");

        return $redirect->with([
            'message'    => "Employee Has been Updated",
            'success' => true,
        ]);

        // return $request;
    }
}
