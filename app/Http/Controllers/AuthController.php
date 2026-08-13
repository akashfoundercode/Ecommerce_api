<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:12',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return response()->json([
            'message'=>'Register Completed',
            'Data'=>$user
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message'=>'Invalid email or password',
            ], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message'=>'login successfully',
            'token'=>$token,
            'Data'=>$user,
            'url'=>$user->profile_photo ? asset('storage/' . $user->profile_photo) : null,
        ]);
    }
    
    public function profile(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name'=>'sometimes|required|string|max:255',
            'email'=>[
                'sometimes',
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password'=>'sometimes|required|min:6|max:12',
            'profile_photo'=>'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $user->update($data);
        $user = $user->fresh();

        return response()->json([
            'message'=>'Profile updated successfully',
            'Data'=>$user,
            'url'=>$user->profile_photo ? asset('storage/'.$user->profile_photo) : null,
        ]);
    }

    public function showProfile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'Data'=>$user,
            'url'=>$user->profile_photo ? asset('storage/'.$user->profile_photo) : null,
        ]);
    }
}
