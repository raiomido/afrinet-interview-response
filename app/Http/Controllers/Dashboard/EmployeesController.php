<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.employees.index', [
            'data' => Employee::latest()->get(),
            'columns' => [
                'name'=> 'text',
                'company'=> 'relationship',
                'email'=> 'text',
                'phone'=> 'text',
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employees.create', [
            'title' => 'Add new Employee',
            'collection' => Company::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        Employee::create($request->only(['firstname', 'lastname', 'company_id', 'email', 'phone']));

        return redirect()->route('dashboard.employees.index')->with([
            'success' => 'Employee added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employees.show', [
            'title' => $employee->name,
            'data' => $employee,
            'fields' => [
                'name'=> 'text',
                'company'=> 'relationship',
                'email'=> 'text',
                'phone'=> 'text',
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit', [
            'data' => $employee,
            'collection' => Company::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->fill($request->only(['firstname', 'lastname', 'company_id', 'email', 'phone']))->save();

        return redirect()->route('dashboard.employees.index')->with([
            'info' => 'Employee updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('dashboard.employees.index')->with([
            'info' => 'Employee removed successfully'
        ]);
    }
}
