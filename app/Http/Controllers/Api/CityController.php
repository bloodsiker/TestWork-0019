<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\City;
use App\Repositories\CityRepository;

class CityController extends Controller
{
    /**
     * @var CityRepository
     */
    private $repository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->repository = $cityRepository;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CityResource::collection($this->repository->getQuery()->get());
    }

    /**
     * @param  CityRequest  $request
     *
     * @return CountryResource
     */
    public function store(CityRequest $request)
    {
        $company = $this->repository->create($request->validated());

        return new CountryResource($company);
    }

    /**
     * @param  City  $city
     *
     * @return CityResource
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }

    /**
     * @param  CityRequest  $request
     * @param  City  $city
     *
     * @return CityResource
     */
    public function update(CityRequest $request, City $city)
    {
        $city = $this->repository->update($request->validated(), $city->id);

        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->repository->delete($city->id);

        return response()->noContent();
    }
}
