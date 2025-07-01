<?php

namespace App\Http\Controllers\Web\superAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('superadmin.users.users', ["users" => User::orderBy("created_at", "desc")->paginate(8)]);
    }
    public function create()
    {
        return view('superadmin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|email|unique:users",
            'password' => "required|min:8",
            'role' => "required|in:admin,user"
        ]);
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ])->assignRole($request->role);
        return redirect()->route('users.index')->with('success', 'تم إنشاء المستخدم بنجاح');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }
    public function edit(User $user)
    {
        return view('superadmin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|email|unique:users,email,$user->id",
            'role' => "required|in:admin,user"
        ]);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        $user->syncRoles($request->role);
        return redirect()->route('super-admin.users.index')->with('success', 'تم تعديل المستخدم بنجاح');
    }
    public function admins()
    {
        return view('superadmin.users.admins', [
            'users' => User::role('admin')
                ->orderBy('created_at', 'desc')
                ->paginate(8)
        ]);
    }
    public function users()
    {
        return view('superadmin.users.users', [
            'users' => User::role('user')
                ->orderBy('created_at', 'desc')
                ->paginate(8)
        ]);
    }
}
