<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\CompanyService;

class CompanyApiController extends Controller
{
    public function __construct(protected CompanyService $companyService){}

    public function index()
    {
        $companies = $this->companyService->index();
        return response()->json($companies,200);
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = $this->companyService->store($request);
        $response = [
            'success' => true,
            'data'    => $company,
            'message' => "Company created successfully",
        ];
        return response()->json($response);
    }

    public function show(){
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
     
        $this->companyService->update($request,$company);
        $response = [
            'success' => true,
            'data'    => $company,
            'message' => "Company updated successfully",
        ];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->companyService->destroy($company);
        $response = [
            'success' => true,
            'message' => "Company deleted successfully",
        ];
        return response()->json($response);
    }

}
