<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegestrationRequest;
use App\Models\provence;
use App\Models\rutbaa;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $provinces=provence::get();
         $rutbaas=rutbaa::get();
        return view('auth.register',compact('provinces','rutbaas'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRegestrationRequest $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'Fname' => ['required', 'string', 'max:255'],
        //     'NID' => ['required'],
        //     'EID' =>  ['required'],
        //     'GFname' => ['required', 'string', 'max:255'],
        //     'phoneNO' =>  ['required'],
        //     'provence_id' =>  ['required'],
        //     'rutbaa_id' => ['required'],
        //     'Management/Commander' => ['required'],
           
        // ]);

        $user = User::create([
            'name' => $request->name,
            'Fname' => $request->Fname,
            'GFname' => $request->GFname,
            'NID' => $request->NID,
            'EID' => $request->CID,
            'phoneNO' => $request->mobile,
            'provence_id' => $request->province,
            'rutbaa_id' => $request->rutbaa,
            'Management_Commander' => $request->Base,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect('list/user');
    }
}
