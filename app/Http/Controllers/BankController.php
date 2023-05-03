<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function getAllBanks()
    {
        $bankNames = Bank::all();
        
        return response()->json($bankNames, 200);
    }
    
    function retrieveAccountInfo(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        return response()->json(['message' => $username . $password . ' information has been retrieved/received.'], 200);

    }

    function validateAccountInfo(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $bankName = $request->input('bankName');
    
        // Search for the bank ID based on the provided bank name
        $bank = Bank::where('name', $bankName)->first();
        $bankAccounts = $bank->bankAccounts()->where('username', $username)->get();
        
        $account = $bankAccounts->first();
        if (!$account) {
            return response()->json(['message' => 'Bank account not found'], 404);
        }

        if ($account->password != $password) {
            // Invalid password
            return response()->json(['message' => 'Invalid password'], 401);
        }
    
        return response()->json([
            'message' => 'success',
            'username' => $account->username,
            'balance' => $account->balance,
            'accountId' => $account->id,
        ], 200);
    }

    function deductBankAmount(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $bankName = $request->input('bankName');
        $paymentAmount = $request->input('paymentAmount');
    
        // Search for the bank ID based on the provided bank name
        $bank = Bank::where('name', $bankName)->first();
        if (!$bank) {
            return response()->json(['message' => 'Bank not found'], 404);
        }
    
        // Retrieve the bank account
        $bankAccount = $bank->bankAccounts()->where('username', $username)->first();

        if (!$bankAccount) {
            return response()->json(['message' => 'Bank account not found'], 404);
        }

        if ($paymentAmount <= 0) {
            return response()->json(['message' => 'Invalid payment amount'], 400);
        }
        
        // Check if the account has sufficient balance
        if ($bankAccount->balance < $paymentAmount) {
            return response()->json(['message' => 'Insufficient balance'], 400);
        }
    
        // Deduct the payment amount from the account balance
        $newBalance = $bankAccount->balance - $paymentAmount;
        $bankAccount->balance = $newBalance;
        $bankAccount->save();
    
        return response()->json(['message' => 'Payment successful', 'balance' => $newBalance], 200);
    }

}
