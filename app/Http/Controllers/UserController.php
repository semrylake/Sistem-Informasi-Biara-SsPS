<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
    }
    public function ganti_password()
    {
        $data = [
            'title' => 'Ganti Password',
        ];
        return view('view_admin.users.ganti_password', $data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ], [
            'username.required' => 'Kolom ini harus diisi !!',
        ]);
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return redirect('/ganti-password')->with('user_not_found', 'Proses update password gagal. Silahkan coba kembali !!');
        }
        $mydata = [
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ];
        $this->User->updatepassword(Auth::user()->id, $mydata);
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('updpass', 'Password telah diupdate. Silahkan login kembali !!');
    }
}
