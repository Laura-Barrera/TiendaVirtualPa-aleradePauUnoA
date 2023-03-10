<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(): RedirectResponse
    {
        $user = User::all()->find(Auth::id());
        if ($user->rol->description == 'administrator') {
            return redirect()->route('employee/management');
        }elseif ($user->rol->description == 'employee') {
            return redirect()->route('employee/data');
        }else{
            return redirect()->route('start');
        }
    }
}
