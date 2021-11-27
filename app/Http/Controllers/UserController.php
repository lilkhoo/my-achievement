<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
// use Illuminate\Support\Facades\Storage;

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
            $validatedData['is_edited'] = true;
        }

        if ($request->password != '') $validatedData['password'] = bcrypt($request->password);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/akun');
    }

    public function show(User $user)
    {
        // Jika user 
        if (Auth::id() == $user->id) {
            return redirect('/profil');
        }

        return view('profil.index', [
            'title' => 'My Achievement | ' . $user->name,
            'certificates' => Certificate::filter(request(['s', 'sort']))->where('user_id', $user->id)->orderBy('course')->paginate(12),
            'user' => $user,
            'page' => 'kontol'
        ]);
    }
}
