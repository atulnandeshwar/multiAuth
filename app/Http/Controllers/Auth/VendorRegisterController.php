<?php

namespace App\Http\Controllers\Auth;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function showRegisterForm()
    {
        return view('auth.vendorRegister');
    }

    protected function validatorVendor(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'store_name' => ['required', 'string', 'max:255'],
            'store_description' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'profile_picture' => ['required',  'max:10000'],

        ]);

    }

    protected function createVendor(Request $request)
    {
        $this->validatorVendor($request->all())->validate();

        $fileName = time().'.'.$request->profile_picture->extension();  

        $request->profile_picture->move(public_path('file'), $fileName);

        $vendor = Vendor::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
            'store_name' => $request['store_name'],
            'store_description' => $request['store_description'],
            'contact_number' => $request['contact_number'],
            'phone_number' => $request['phone_number'],
            'profile_picture' => $fileName ,
        ]);
        if($vendor ){
            return redirect()->route('vendor.login')->with('message','Vendor rgisterd successfully');
        }
        
    }
}
