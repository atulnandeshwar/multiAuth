<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.vendorLogin',[
            'page_name'=>'Vendor',
            'loginUrl'=>route('vendor.login')
        ]);
    }

    public function login(Request $request)
    {
       // Validate the form data
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6',
        
        ]);

        // Attempt to log the user in
        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('vendor.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('vendor')->logout();
        return redirect('/vendor/login');
    }
}
