<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        return view('customer.order');
    }

    public function store()
    {
        //
    }
}
