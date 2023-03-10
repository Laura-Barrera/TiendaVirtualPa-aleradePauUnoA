<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(): Factory|View|Application
    {
        $user = User::all()->find(Auth::id());
        $employee = $user->employee;
        return view('components.employee.data')->with(['employee' => $employee]);
    }
}
