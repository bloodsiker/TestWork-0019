<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Repositories\CountryRepository;

class CountryController extends Controller
{
    /**
     * @var CountryRepository
     */
    private $repository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->repository = $countryRepository;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CountryResource::collection($this->repository->getAll());
    }

    /**
     * @param  CountryRequest  $request
     *
     * @return CountryResource
     */
    public function store(CountryRequest $request)
    {
        $company = $this->repository->create($request->validated());

        return new CountryResource($company);
    }

    /**
     * @param  Country  $country
     *
     * @return CountryResource
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    /**
     * @param  CountryRequest  $request
     * @param  Country  $country
     *
     * @return CountryResource
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country = $this->repository->update($request->validated(), $country->id);

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $this->repository->delete($country->id);

        return response()->noContent();
    }

    public function cities(Country $country)
    {
        return new CityResource($country->cities);
    }
}
