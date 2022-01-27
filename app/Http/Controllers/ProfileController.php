<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword(){
        return view('profile.change-password');
    }
    public function updatePassword(Request $request){
        $user = Auth::user();
        $userPassword = $user->password;
        $request->validate([
           'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required'
        ]);
        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password' => 'password not match']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success','password successfully updated');
    }
    public function updateProfileView(){
        return view('profile.index');
    }
    public function updatePhoto(Request $request){
        $request->validate([
            'photo' => 'required|file|mimes:png,jpeg,jpg,max:1000',
        ]);
        $newName = uniqid()."_profile.".$request->file('photo')->extension();
        $request->file('photo')->storeAs("public/profile",$newName);
        $currentUser = User::find(Auth::id());
        $currentUser->photo = $newName;
        $currentUser->update();

        return redirect()->back();
    }
    public function updateProfile(Request $request){
        $request->validate([
           'name' => 'required',
            'email' => 'required',
            'bio' => 'required|max:225',
            'phone' => 'required',
        ]);


        $currentUser = User::find(Auth::id());
        $currentUser->name = $request->name;
        $currentUser->email = $request->email;
        $currentUser->phone = $request->phone;
        $currentUser->bio = $request->bio;
        $currentUser->update();

        return redirect()->back();
    }
}
