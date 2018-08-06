<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index()
    {
        return view('admin.price.index');
    }
}
