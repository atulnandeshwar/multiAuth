<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        
        return view('admin.index');
    }


    public function changePassword()
    {
        return view('admin.changepassword');
    }

    public function changePasswordSave(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'old_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
        ]);
            
        $pass = Hash::make($request['password']);
        
        $result = Admin::where('id',Auth::user()->id)->first();
         
        if($result) {
            $result->password = $pass;
            $result->save();
            return redirect()->route('admin.dashboard')->with('message','Password changed Successfully');
        } else {
            return redirect()->route('admin.dashboard')->with('message','Password not  changed');
        }

    }

    public function editProfile() {
        return view('admin.editProfile');
    }

    public function editProfileSave(Request $request) {
        
        // Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'id' => 'required',
        ]);
        
        Admin::where('id', $request->id )->update(['name'=>$request->name]);
    }

    public function customer() {
        $customers = DB::table('customers')->get();
        return view('admin.customer', [
            'customers'=>$customers
        ]);
    }

    public function vendor() {
        $vendors = DB::table('vendors')->get();
        return view('admin.vendor', [
            'vendors'=>$vendors
        ]);
    }

}
