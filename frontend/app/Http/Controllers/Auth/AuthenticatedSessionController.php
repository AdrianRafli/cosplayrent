<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Client;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $client = new Client();
        try {
            $response = $client->post('http://localhost:8080/login', [
                'json' => [
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody()->getContents(), true);

            if ($statusCode == 200) {
                // Assume the API returns user data and token
                $user = $body['user'];
                $token = $body['token'];

                // Manually log the user in
                Auth::loginUsingId($user['id']);

                $request->session()->regenerate();

                if ($user['role'] == 'admin') {
                    return redirect('admin/dashboard');
                } else if ($user['role'] == 'owner') {
                    return redirect('owner/dashboard');
                }

                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['email' => 'An error occurred during login.']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
