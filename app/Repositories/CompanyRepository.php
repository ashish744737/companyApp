<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function getAll()
    {
        return Company::latest()->simplePaginate(10);
    }

    public function createCompany(array $data)
    {
        return Company::create($data);
    }

    public function updateCompany(array $data, $company)
    {
        return $company ? $company->update($data) : null;
    }

    public function deleteCompany($company)
    {
        return $company ? $company->delete() : null;
    }

    public function getOrderedRecords($column, $order)
    {
        return Company::OrderByColumn($column, $order)->get();
    }
}
