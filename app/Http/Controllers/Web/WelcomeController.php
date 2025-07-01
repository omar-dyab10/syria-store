<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('welcome', ['advertisements' => Advertisement::where('status','confirmed')->paginate(6)]);
    }
    public function account()
    {
        return view('auth.account');
    }
}
