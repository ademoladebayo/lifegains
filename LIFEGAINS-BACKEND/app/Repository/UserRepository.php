<?php

namespace App\Repository;

use App\Model\UserModel;
use App\Service\AdminService;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function createUser(Request $request)
    {
        $faker =  new Faker();
        $UserModel = new UserModel();
        $UserModel->first_name = $request->first_name;
        $UserModel->last_name = $request->last_name;
        $UserModel->email = $request->email;
        $UserModel->phone_number = $request->phone_number;
        $UserModel->referal_unique_id = $request->referal_unique_id;

        //generate unique ID
        $UserModel->unique_id = $faker->unique;



        $UserModel->save();

        return response()->json(['success' => true, 'message' => 'Welcome to Lifegains.']);
    }

    public function getPassword($email)
    {
        return DB::select("select password from user where email ='" . $email . "'")[0]->password;
    }

}
