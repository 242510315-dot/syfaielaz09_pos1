<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(LoginRequest $request)
    {
        $key = $this->loginRateLimitKey($request);

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withInput($request->only('email'))
                ->with('lockout_seconds', $seconds)
                ->withErrors([
                    'email' => "Terlalu banyak percobaan. Silakan tunggu {$seconds} detik.",
                ]);
        }

        if (Auth::attempt($request->validated())) {

            RateLimiter::clear($key);

            $request->session()->regenerate();

            return redirect()->route('dashboard')
                ->with('success', 'Selamat Datang, ' . Auth::user()->name);
        }

        RateLimiter::hit($key, 30);

        $errors = [
            'email' => 'Email atau password tidak valid',
        ];

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withInput($request->only('email'))
                ->with('lockout_seconds', $seconds)
                ->withErrors([
                    'email' => "Terlalu banyak percobaan. Silakan tunggu {$seconds} detik.",
                ]);
        }

        return back()->withInput($request->only('email'))->withErrors($errors);
    }

    private function loginRateLimitKey(Request $request): string
    {
        return 'login:' . strtolower((string) $request->input('email')) . '|' . $request->ip();
    }

   public function logout(Request $request)
  {
    // Mengakhiri sesi pengguna
    Auth::logout();

    // Menghapus session pengguna
    $request->session()->invalidate();
    // Meregenerasi token CSRF
    $request->session()->regenerateToken();

    // Redirect ke halaman login setelah logout
    return redirect()->route('login')->with('success', 'Anda telah keluar aplikasi');
  }
}