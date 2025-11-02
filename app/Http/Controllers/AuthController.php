<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Coba login langsung
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $this->redirectByRole($user);
        }

        // Jika login gagal, cek apakah username-nya NISN siswa
        $siswa = Siswa::where('nisn', $request->username)->first();
        if ($siswa && $siswa->user && Auth::attempt(['username' => $siswa->user->username, 'password' => $request->password])) {
            $user = Auth::user();
            return $this->redirectByRole($user);
        }

        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    private function redirectByRole($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'guru':
                return redirect()->route('guru.dashboard');
            case 'ortu':
                return redirect()->route('ortu.dashboard');
            default:
                Auth::logout();
                return redirect('/login')->withErrors(['role' => 'Role tidak dikenali.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
