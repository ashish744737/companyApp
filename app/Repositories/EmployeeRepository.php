<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Employee;

class EmployeeRepository
{
    public function getAll()
    {
        return Employee::with('company')->latest()->simplePaginate(10);
    }

    public function createEmployee(array $data)
    {
        return Employee::create($data);
    }

    public function updateEmployee(array $data, $employee)
    {
        return $employee ? $employee->update($data) : null;
    }

    public function deleteEmployee($employee)
    {
        return $employee ? $employee->delete() : null;
    }
}
