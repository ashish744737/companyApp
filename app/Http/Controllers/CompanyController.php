<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    public function __construct(protected CompanyService $companyService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyService->index();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $company = Company::with('employees')->findOrFail($id);
        $employees = $company->employees;
        return view('companies.show',compact('company','employees'));
    }

    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $this->companyService->store($request);
        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->companyService->update($request,$company);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->companyService->destroy($company);
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
    }
}
