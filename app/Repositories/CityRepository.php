<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class CityRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return City::class;
    }

    public function getQuery()
    {
        return $this->model->query()->with(['country'])->select(['cities.*']);
    }

    public function getOneById($id): ?Model
    {
        return $this->getQuery()->where('id', $id)->first();
    }
}
