<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller {
    public function index() {
        return view('user.user_profile');
    }

    public function updateprofile(Request $request) {
        $validator = Validator::make($request->all(),[
            'password' => ['min:8', 'max:16']
        ]);

        try {
            $user = User::where('id',Auth::user()->id)->first();
            if (!empty($request->name)) {
                $user->name = $request->name;
            }
            
            if (!empty($request->current_password)) {
                if ($validator->fails()) {
                    return redirect() -> route('usr.profile') -> with(['password' => 'The password must be at least 8 characters.']);
                }

                if(Hash::check($request->current_password, $user->password)) {
                    if($request->password == $request->password_confirmation) {
                        $user->password = Hash::make($request->password);
                     }else {
                        return redirect() -> route('usr.profile') -> with(['password' => 'New password did not match. Try again!']);
                    }
                } else {
                    return redirect() -> route('usr.profile') -> with(['current_password' => 'Wrong Password!']);
                }
            }

            $user->update();

            return redirect() -> route('usr.profile')->with(['success' => 'Your profile has been updated.']);
        } catch(QueryException $e){
            return redirect() -> route('usr.profile')->with(['error' => $e->errorInfo]);
        }
    }
}