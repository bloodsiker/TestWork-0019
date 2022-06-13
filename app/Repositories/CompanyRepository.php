<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return Company::class;
    }

    public function getQuery()
    {
        return $this->model->query()->with(['country'])->select(['companies.*']);
    }

    public function getOneById($id): ?Model
    {
        return $this->getQuery()->where('id', $id)->first();
    }
}
