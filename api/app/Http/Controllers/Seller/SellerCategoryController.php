<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerCategoryController extends Controller
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
                ->whereHas('categories')
                ->with('categories')
                ->get()
                ->pluck('categories')
        );
    }
}
