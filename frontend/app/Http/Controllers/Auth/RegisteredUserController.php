<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Models\Shop;
// use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        if ($request->role === 'owner') {
            $rules['shop_name'] = ['required', 'string', 'max:255'];
            $rules['city'] = ['required', 'string', 'max:255'];
            $rules['address'] = ['required', 'string', 'max:255'];
            $rules['phone_number'] = ['required', 'string', 'max:255'];
        }

        $request->validate($rules);

        // Hash the password
        $hashedPassword = Hash::make($request->password);

        $client = new Client();
        try {
            $response = $client->post('http://localhost:8080/register', [
                'json' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'password' => $hashedPassword,
                    'shop_name' => $request->shop_name ?? null,
                    'city' => $request->city ?? null,
                    'address' => $request->address ?? null,
                    'phone_number' => $request->phone_number ?? null,
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody()->getContents(), true);

            if ($statusCode == 201) {
                event(new Registered($body['user']));

                toastr()->closeButton()->addSuccess('Akun Berhasil Dibuat!');
                return redirect(route('login'));
            } else {
                toastr()->closeButton()->addError('Terjadi kesalahan saat membuat akun!');
                return redirect()->back()->withInput()->withErrors($body['error']);
            }
        } catch (\Exception $e) {
            toastr()->closeButton()->addError('Terjadi kesalahan saat membuat akun!');
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
