<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;

class EmployeeService
{
    public function __construct(protected  EmployeeRepository $employeeRepository){}

    public function index(){
        try {
            return $this->employeeRepository->getAll();
        } catch (Exception $e) {
            throw new Exception('Error :' . $e->getMessage());
        }
    }

    public function store($request)
    {
        try {
            $validated = $request->validated();
            return $this->employeeRepository->createEmployee($validated);

        } catch (Exception $e) {
            throw new Exception('Error :' . $e->getMessage());
        }
    }

    public function update($request, $employee)
    {
        try {

            $validated = $request->validated();
            return $this->employeeRepository->updateEmployee($validated,$employee);

        } catch (Exception $e) {
            throw new Exception('Error : ' . $e->getMessage());
        }
    }
    
    public function destroy($employee)
    {
        try {

            return $this->employeeRepository->deleteEmployee($employee);

        } catch (Exception $e) {
            throw new Exception('Error : ' . $e->getMessage());
        }
        
    }
}
