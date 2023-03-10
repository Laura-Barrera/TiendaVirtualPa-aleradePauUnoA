<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdministrator');
    }
    public function index(): Factory|View|Application
    {
        $data['employees'] = Employee::all();
        return view('components.employee.index', $data);
    }
}
