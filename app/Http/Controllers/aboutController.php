<?php

namespace App\Http\Controllers;

use App\Models\Order_item;
use App\Models\Orders;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function about(){
        return view('website.about');
    }
}
