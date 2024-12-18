<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Services\EmployeeService;
use App\Models\Company;
use App\Services\CompanyService;

class EmployeeApiController extends Controller
{
    public function __construct(protected EmployeeService $employeeService, protected CompanyService $companyService){}
     
    public function index()
    {
        $employees = $this->employeeService->index();
        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = $this->employeeService->store($request);
        $response = [
            'success' => true,
            'data'    => $employee,
            'message' => "Employee data added successfully",
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->employeeService->update($request,$employee);
        $response = [
            'success' => true,
            'data'    => $employee,
            'message' => "Employee data updated successfully",
        ];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee = $this->employeeService->destroy($employee);
        $response = [
            'success' => true,
            'data'    => $employee,
            'message' => "Employee data deleted successfully",
        ];
        return response()->json($response);
    }
}
