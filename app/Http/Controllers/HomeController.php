<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkout;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
       $checkouts = Checkout::with('Camp')->whereUserid(Auth::id())->get();
       return view('user.dashboard', [
        'checkouts' => $checkouts
       ]);
    }
}
