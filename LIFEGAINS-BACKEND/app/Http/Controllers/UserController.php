<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function createUser(Request $request)
    {
        $UserRepository = new UserRepository();
        $UserRepository->createUser($request);
    }

    function signIn(Request $request)
    {
        $UserService = new UserService();
        $UserService->signIn($request);
    }
}
