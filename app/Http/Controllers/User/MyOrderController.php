<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TransactionTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        return view('auth.my-order', [
            'transactions' => TransactionTraining::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function invoice($transaction_code)
    {
        return view('auth.invoice', [
            'transaction' => TransactionTraining::with(['training', 'user'])->where('transaction_code', $transaction_code)->firstOrFail()
        ]);
    }
}
