<?php

namespace App\Classes\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var \App\Models\BaseModel | \Illuminate\Database\Eloquent\Builder
     */
    public $model;

    public function __construct()
    {
        $this->model = $this->makeModel();
    }

    abstract public function model();

    /**
     * @return \App\Models\BaseModel | \Illuminate\Database\Eloquent\Builder
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeModel()
    {
        return app()->make($this->model());
    }

    // Get all data
    public function all()
    {
        return $this->model->all();
    }

    // Find data
    public function find($id)
    {
        return $this->model->find($id);
    }

    // Create data
    public function create($attribute)
    {
        return $this->model->create($attribute);
    }

    // Update data
    public function update($id, $attribute)
    {
        return $this->model->where($this->model->getKeyName(), $id)->update($attribute);
    }

    // Delete data
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // Insert data
    public function insert($attribute)
    {
        return $this->model->insert($attribute);
    }
}
