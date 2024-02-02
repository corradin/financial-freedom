<?php

namespace App\Services\CashAccounts;

use App\Models\CashAccount;

class IndexCashAccounts
{
    public function index()
    {
        $cashAccounts = CashAccount::with('institution')
            ->where('user_id', auth()->id())
            ->orderBy('name', 'ASC')
            ->get();

        return $cashAccounts;
    }
}