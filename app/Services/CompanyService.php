<?php

namespace App\Services;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;

class CompanyService
{
    public function __construct(protected  CompanyRepository $companyRepository){}

    public function index(){
        try {
            return $this->companyRepository->getAll();
        } catch (Exception $e) {
            throw new Exception('Error :' . $e->getMessage());
        }
    }

    public function store($request)
    {
        try {

            $validated = $request->validated();
            
            $upload_path = public_path('uploads');
            ensure_directory_exists($upload_path);
        
            $image_name = null;

            if ($request->hasFile('logo')) {
                $image_name = time() . '.' . $validated['logo']->extension();
                $validated['logo']->move($upload_path, $image_name);
            }
            
            $validated['logo'] = $image_name;
            
            return $this->companyRepository->createCompany($validated);

        } catch (Exception $e) {
            throw new Exception('Error :' . $e->getMessage());
        }
    }

    public function update($request, $company)
    {
        try {
            
            $validated = $request->validated();

            $upload_path = public_path('uploads');
            ensure_directory_exists($upload_path);
        
            $image_name = $company->logo;
            if ($request->hasFile('logo')) {
                $image_name = time() . '.' . $validated['logo']->extension();
                $validated['logo']->move($upload_path, $image_name);
                if ($company->logo && file_exists(public_path('uploads/'.$company->logo))) {
                    unlink(public_path('uploads/'.$company->logo));
                }
            }

            $validated['logo'] = $image_name;
            return $this->companyRepository->updateCompany($validated,$company);

        } catch (Exception $e) {
            throw new Exception('Error : ' . $e->getMessage());
        }
    }
    
    public function destroy(Company $company)
    {
        try {
            
            if ($company->logo && file_exists(public_path('uploads/'.$company->logo))) {
                unlink(public_path('uploads/'.$company->logo));
            }

            return $this->companyRepository->deleteCompany($company);

        } catch (Exception $e) {
            throw new Exception('Error : ' . $e->getMessage());
        }
        
    }

    public function getOrderedRecords($column, $order="asc")
    {
        try {
            return $this->companyRepository->getOrderedRecords($column, $order);
        } catch (Exception $e) {
            throw new Exception('Error : ' . $e->getMessage());
        }
        
    }
}
