<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    /**
     * @var CompanyRepository
     */
    private $repository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->repository = $companyRepository;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CompanyResource::collection($this->repository->getQuery()->get());
    }

    /**
     * @param  CompanyRequest  $request
     *
     * @return CompanyResource
     */
    public function store(CompanyRequest $request)
    {
        $company = $this->repository->create($request->validated());

        return new CompanyResource($company);
    }

    /**
     * @param  Company  $company
     *
     * @return CompanyResource
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * @param  CompanyRequest  $request
     * @param  Company  $company
     *
     * @return CompanyResource
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company = $this->repository->update($request->validated(), $company->id);

        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $this->repository->delete($company->id);

        return response()->noContent();
    }
}
