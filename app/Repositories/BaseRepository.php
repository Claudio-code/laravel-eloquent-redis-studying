<?php

namespace App\Repositories;

use App\DTO\AbstractDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function __construct(
        protected Model $model
    ) {
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    private function refresh(): Model
    {
        return $this->model->refresh();
    }

    public function findAll(): Collection
    {
        return $this->model::all();
    }

    public function findOne(int $id): ?Model
    {
        return $this->model::findOrFail($id);
    }

    public function create(AbstractDTO $abstractDTO): Model
    {
        $this->model::create($abstractDTO->getAllFields());

        return $this->refresh();
    }

    public function update(AbstractDTO $abstractDTO): Model
    {
        $this->model->update($abstractDTO->getAllFields());

        return $this->refresh();
    }

    public function delete(int $id): void
    {
        $this->findOne($id)?->delete();
    }
}
