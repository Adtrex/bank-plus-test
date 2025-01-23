<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Events\TransactionMade;

class FinanceController extends Controller
{
    public function getBalance(){
        $deposit = Transaction::where('user_id', auth()->id())->where('type', 'deposit')->get()->count();
        $withraw = Transaction::where('user_id', auth()->id())->where('type', 'withdraw')->get()->count();

        $balance = int($deposit) - int($withraw);

        return $balance;
    }

    public function deposit(Request $request) {

        $request->validate([
            'amount'=>'required|numeric|min:1',
        ]);

        $transaction = Transaction::create([
            'user_id'=>auth()->id(),
            'amount'=>$request->amount,
            'type'=>'deposit',
        ]);

        event(new TransactionMade('deposit', $transaction));

    }

    public function withdraw() {

        $request->validate([
            'amount'=>'required|numeric|min:1',
        ]);

        $balance = $this->getBalance();

        if($balance < $request->amount) {
            return 'Insufficient Funds';
        }

        $transaction = Transaction::create([
            'user_id'=>auth()->id(),
            'amount'=>$request->amount,
            'type'=>'withdraw',
        ]);

        event(new TransactionMade('withdraw', $transaction));

    }

    public function getTransactions(Transaction $transaction){

        return $transaction->get();

    }
}
