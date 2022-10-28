<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\requestRegister;
use App\Http\Requests\UpdateForgotPasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Biodata;
use Mail;


class AuthController extends Controller
{
    public function register(requestRegister $request)
    {
        $user = new User;

        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        if($user->save()){
            $biodata = new Biodata;
            $biodata->id_user = $user->id;
            $biodata->nama = $request->fullname;
            $biodata->save();
        }       

        // Return Response Data User
        return response()->json(['data' => $user]);
    }

    public function login(Request $request)
    {
        // cek auth username & password
        if (!Auth::attempt($request->only('username', 'password')))
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // get username berdasarkan request
        $user = User::where('username', $request['username'])->firstOrFail();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return Response Message, Akses Token, Type Token
        return response()->json(['message' => 'Hi '.$user->username.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', 'id' => auth()->user()->id, 'role' => auth()->user()->role ]);
    }

    public function checkEmail( Request $request ){
        $email = $request->email;

        return User::where('email', $email)->first();
    }

    public function sendLinkForgotPassword(Request $request){
        // return $request;

        Mail::send('sendLink',
                array(
                   'email' => $request->get('email'),
                   'url' => $request->get('url')
               ), function ($msg) use ($request)
                {                                                 
                      $msg->subject("SEND LINK FORGOT PASSWORD");
                      $msg->from('rahmatfitri104@gmail.com');
                      $msg->to($request->get('email'), 'User');
                });


        return response()->json(['msg' => 'success']);
    }

    public function saveForgotPassword(UpdateForgotPasswordRequest $request)
    {    
        $user = User::find($request->id);

        $user->password = Hash::make($request->password);
        $user->save();

        // Return Response Data User
        return response()->json(['data' => $user]);
    }

    // method for user logout and delete token
    public function logout()
    {
        // delete token
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

}
