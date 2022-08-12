<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DoctorUser;
use App\Models\User;
use App\Models\Doctor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredDoctorUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.doctorRegister');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'license' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // CHECK IF DOCTOR IS REGISTERED IN THE SYSTEM
        $license = Doctor::where('license',$request->license)->first();
        if ($license) {
            // DOCTOR EXISTS IN THE SYSTEM
            $doctorUser = DoctorUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($doctorUser));

            Auth::login($doctorUser);

            if (auth()->guard('doctor')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {

                $user = auth()->guard('doctor')->user();

                return redirect()->intended(url('/doctor/dashboard'));
        }
        } else {
            return back()->withErrors(["unregisteredDoctor" => "You are not registered in the system"]);
        }
    }
}
