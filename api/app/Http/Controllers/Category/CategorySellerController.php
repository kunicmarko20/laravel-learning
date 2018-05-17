<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorySellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return $this->jsonResponse(
            $category->products()
                ->with('seller')
                ->get()
                ->pluck('seller')
                ->unique('id')
                ->values()
        );
    }
}
