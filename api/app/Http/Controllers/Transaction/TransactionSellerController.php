<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use App\Http\Controllers\Controller;

class TransactionSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        return $this->jsonResponse($transaction->product->seller);
    }
}
