<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Author;
use App\Repositories\AuthorRepository;

class AuthorEloquent implements AuthorRepository
{
    protected $model;

    function __construct(Author $model)
    {
        $this->model = $model;
    }

    public function rules(): array
    {
        return $this->model::$rules;
    }

    public function all()
    {
        return $this->model->all();
    }


    public function detail($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($data, $id)
    {
        $author = $this->find($id);
        $author->update($data);
        return $author;
    }

    public function delete($id)
    {
        $author = $this->find($id);
        $author->delete();
        return $author;
    }
}