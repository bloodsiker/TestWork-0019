<?php

namespace App\Repositories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class CountryRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return Country::class;
    }

    public function getQuery()
    {
        return $this->model->query()->select(['country.*']);
    }

    public function getOneById($id): ?Model
    {
        return $this->getQuery()->where('id', $id)->first();
    }
}
