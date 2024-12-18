<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Services\EmployeeService;
use App\Services\CompanyService;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeService $employeeService, protected CompanyService $companyService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeService->index();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->companyService->getOrderedRecords('name');
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeService->store($request);
        return redirect()->route('employees.index')->with('success', 'Employee data created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = $this->companyService->getOrderedRecords('name');
        return view('employees.edit', compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->employeeService->update($request,$employee);
        return redirect()->route('employees.index')->with('success', 'Employee data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->employeeService->destroy($employee);
        return redirect()->route('employees.index')->with('success', 'Employee data deleted successfully!');
    }
}
