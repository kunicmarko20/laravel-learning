<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        return $this->jsonResponse(
            $seller->products()
                ->whereHas('transactions')
                ->with('transactions')
                ->get()
                ->pluck('transactions')
                ->collapse()
        );
    }
}
