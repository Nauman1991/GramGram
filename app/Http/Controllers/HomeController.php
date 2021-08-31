<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSocial;
use App\Models\UserLogs;

use Redirect;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $userID = Auth::user()->id;
        $userData = User::where('id', $userID)->with('getSocialUser')->first();
        $userLogs = UserLogs::where('uid' , $userID)->get() ;

        return view('home')->with('data', $userData)->with('logs' , $userLogs);
    }

    public function saveSocialUsers(Request $request)
    {
        $email = $request->input('email_1');
        $phone = $request->input('phone_1');
        $isActive = ($request->input('is_active_1') == 'on') ? 1 : 0;
        $provider = $request->input('provider_1');
        $customEmail = $request->input('custom_email');

        $userSocial = UserSocial::updateOrCreate([
            'uid' => Auth::user()->id,
            'email' => $email,
            'phone' => $phone,
            'is_active' => $isActive,
            'provider' => $provider,
            'custom_email' => $customEmail,
            'social_link' => ''
        ]);

        if ($userSocial) {
            return Redirect::route('home')->with('message', 'User Inserted!');
        } else {
            return Redirect::route('home')->with('error', 'Something went wrong!');
        }
    }

    public function editUser($id)
    {
        $userData = UserSocial::find($id);
        return view('editUser')->with('data', $userData);
    }

    public function deleteUser($id)
    {
        $userDelete = UserSocial::where('id',$id)->delete();

        if($userDelete){
            return true;
        }else{
            return false;
        }
    }

    public function updateUser(Request $request)
    {
        $id = $request->input('id');
        $userUpdate = UserSocial::where('id', $id)->update(
            [
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'is_active' => ($request->input('is_active_1') == 'on') ? 1 : 0,
                'provider' => $request->input('provider_1'),
                'custom_email' => $request->input('custom_email'),
            ]
        );

        if ($userUpdate) {
            return Redirect::route('home')->with('message', 'User Update!');
        } else {
            return Redirect::route('home')->with('error', 'Something went wrong!');
        }
    }
}
