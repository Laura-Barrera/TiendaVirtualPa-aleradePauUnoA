<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Requests\Employee\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class EmployeeManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(): Factory|View|Application
    {
        $data['employees'] = Employee::all();
        return view('components.employeeManagement.index', $data);
    }
    public function create(): Factory|View|Application
    {
        return view('components.employeeManagement.create');
    }

    public function store(EmployeeRequest $request): Redirector|Application|RedirectResponse
    {
        $user = new User([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'rol_id' => 2
        ]);
        $user->save();

        $employee = new Employee([
            'name' => $request->get('name'),
            'lastName' => $request->get('lastName'),
            'documentType' => $request->get('documentType'),
            'documentNumber' => $request->get('documentNumber'),
            'phoneNumber' => $request->get('phoneNumber'),
            'address' => $request->get('address'),
            'hiringDate' => $request->get('hiringDate'),
            'salary' => $request->get('salary'),
            'user_id' => $user->getAttribute('id')
        ]);
        $employee->save();

        return redirect('employee/management')->with('message', 'successfulEmployeeCreation');
    }

    public function edit(Employee $employee): Factory|View|Application
    {
        return view('components.employeeManagement.edit', compact('employee'));
    }

    public function update(Employee $employee, EmployeeUpdateRequest $request): Redirector|Application|RedirectResponse
    {
        $employee->update($request->all());
        $employee->save();
        return redirect('employee/management')->with('message', 'successfulEmployeeUpdate');
    }

    public function destroy(Employee $employee): Redirector|Application|RedirectResponse
    {
        $user = User::all()->find($employee->getAttribute('user_id'));
        $user->delete();
        $employee->delete();
        return redirect('employee/management')->with('message', 'successfulEmployeeDeletion');
    }
}
