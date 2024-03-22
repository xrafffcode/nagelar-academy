<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionTraining;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->count();

        return view('pages.admin.dashboard', [
            'users' => $users,
            'transactions' => TransactionTraining::with(['training', 'user'])->limit(8)->get(),
            'successful' => TransactionTraining::with(['training', 'user'])->where('transaction_status', 'SUCCESS')->count(),
            'transactionToday' => TransactionTraining::with(['training', 'user'])->whereDate('created_at', date('Y-m-d'))->count(),
        ]);
    }
}
