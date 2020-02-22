<?php

namespace App\Repositories;

interface AuthorRepository {
    public function all();

    public function detail($id);

    public function store(array $data);

    public function find($id);

    public function update(array $data, $id);

    public function delete($id);
}