<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Model\UserModel;


class UserService
{

    public function signIn(Request $request)
    {
        $UserRepository = new UserRepository();
        $User = UserModel::where('email', $request->email)->with('referals')->get();
        if ($User == null) {
            return  response(['success' => false, 'message' => "Invalid User!"]);
        } else {

            if ($UserRepository->getPassword($request->id) == $request->password) {
               
                return  response(['success' => true, 'message' => 'Welcome, ' . $User->first_name, 'data' => $User]);
            } else {
                return  response(['success' => false, 'message' => "Invalid Password"]);
            }
        }
    }
}
