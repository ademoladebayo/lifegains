<?php

namespace App\Repository;

use App\Model\TransactionModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionRepository
{
    public function saveTransaction(Request $request)
    {
        $TransactionModel = new TransactionModel();
        $TransactionModel->user_id = $request->user_id;
        $TransactionModel->transaction_reference = $request->transaction_reference;
        $TransactionModel->transaction_description = $request->transaction_description;
        $TransactionModel->transaction_status = $request->transaction_status;
        $TransactionModel->transaction_amount = $request->transaction_amount;

        $TransactionModel->save();

        return response()->json(['success' => true, 'message' => 'Transaction Created']);
    }
}
