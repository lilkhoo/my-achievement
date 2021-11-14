<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(Request $request, User $user)
    {

        $oldImage = User::firstWhere('id', $user->id)->avatar;

        $rules =  [
            'name' => ['required', 'string', 'max:255'],
        ];

        if ($request->file('avatar')) {
            Storage::delete($oldImage);
            $rules['avatar'] = 'required|image|file|max:2048';
        }

        if ($request->username !== $user->username) $rules['username'] = ['required', 'string', 'max:255', 'min:6', 'unique:users'];

        if ($request->password != '') $rules['password'] = ['required', Rules\Password::defaults()];

        $validatedData = $request->validate($rules);

        if ($request->file('avatar')) {
            $validatedData['avatar'] = $request->file('avatar')->store(null, 'akun');
        }
    }
}
