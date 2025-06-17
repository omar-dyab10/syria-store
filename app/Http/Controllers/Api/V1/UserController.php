<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\UserUpdateRequest;
use App\Http\Requests\Api\V1\UserRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(UserResource::collection(User::all()));
    }
    public function store(UserRequest $request)
    {
        // dd($request);
        if ($request['role'] == "admin") {
            User::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'phone' => $request["phone"],
                'national_number' => $request["national_number"],
                'password' => bcrypt($request['password']),
            ])->assignRole('admin');
            return response()->json([
                "message" => "User Created Successfully",
            ]);
        }
    }
    public function show(User $user)
    {
        return response()->json(new UserResource($user));
    }
    public function update(UserUpdateRequest $request, User $user)
    {
        // dd($request);
        $user->update([
            'first_name' => $request['first_name'] ?? $user->first_name,
            'last_name' => $request['last_name'] ?? $user->last_name,
            'email' => $request['email'] ?? $user->email,
            'phone' => $request['phone'] ?? $user->phone,
            'national_number' => $request['national_number'] ?? $user->national_number,
        ]);

        if ($request->has('password')) {
            $user->update([
                'password' => bcrypt($request['password'])
            ]);
        }
        if ($request->input('role')) {
            $user->assignRole($request->input('role'));
        }

        return response()->json([
            "message" => "User Updated Successfully",
        ]);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            "message" => "User Deleted Successfully",
        ]);
    }
}
