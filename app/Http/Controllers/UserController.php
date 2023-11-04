<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        // $customers = User::orderBy('id_user', 'asc')->paginate();
        $users = User::orderBy('id_user', 'asc')->paginate();
        return view('users.index', compact('users'));
    }

    // Editar un curso en particular
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            // 'name' => 'required|min:3',
            'first_names' => 'required',
            'last_names' => 'required',
            'email' => 'required',
            'editPassword' => 'nullable|boolean',
            'password' => 'sometimes|nullable|required_with:password_confirmation|confirmed',
            'password_confirmation' => 'sometimes|nullable',
            'type' => 'nullable|boolean',
        ]);
        // Update properties except password
        $checked = $request->has('type') ? true : false;
        $data = $request->except(['editPassword','password', 'type']);

        // Update 'type' attribute based on checkbox
        $data['type'] = $checked ? 1 : 0;

        // Update properties except password
        $user->update($data);

        $editPassword = $request->has('editPassword') ? 1 : 0;
        // Check if a new password is provided and update the password
        if ($editPassword && $request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // Assign 'Admin' role if 'type' is true
        if ($checked) {
            $user->assignRole('Admin');
        } else {
            $user->removeRole('Admin');
        }

        return redirect()->route('users.index', $user);
    }
}
