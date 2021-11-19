<?php

namespace App\Http\Controllers;

use App\Repository\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    function saveTransaction(Request $request)
    {
        $TransactionRepository = new TransactionRepository();
        $TransactionRepository->saveTransaction($request);
    }
}
