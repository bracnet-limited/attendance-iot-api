<?php

namespace App\Http\Controllers\v1\AdminControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request){
        if($request->userID == "" || $request->password == ""){
            $this->addLog(action:'AUTH_VALIDATION_ERR', data: ['user'=>$request->userID??""]);
            return response()->json(['success' => false, 'message' => 'Invalid login attempt!!'], 200);
        }

        $user = User::where( $this->getUserIdType($request->userID), $request->userID)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            $action = !$user ? '_ID_ERR' : '_PASS_ERR';
            $msg = !$user ? 'No account is registered with this '.$this->getUserIdType($request->userID) : 'Invalid password';
            $this->addLog(action:'USER_AUTH'.$action, data: ['user'=>$request->userID]);
            return response()->json(['success' => false, 'message' => $msg], 200);
        }

        if($user && $user->status != 1){
            return response()->json(['message' => 'Your account has been suspended.', 'success'=>false], 200);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        $this->addLog(action:'USER_AUTH', user: $user->id);

        Session::put('account_type', $user->account_type);

        return response()->json(['user'=>$user, 'message' => 'Logged in successfully!!', 'token'=>$token,'success'=>true,  'auth_type' => 'login'], 201);
    }

    // public function logout(Request $request){
    //     $this->addLog(action:'USER_LOGOUT', user: auth()->user()->id);
    //     $request->user()->tokens()->delete();
    //     Session::flush();
    //     return response()->json($this->result(msg: __('messages.successfulLogout')), 200);
    // }

    // private function getUserIdType($userId){
    //     return is_numeric($userId) ? 'mobile' : 'email';
    // }

    private function getUserIdType($userId){
        return is_numeric($userId) ? 'mobile' : 'email';
    }
}
