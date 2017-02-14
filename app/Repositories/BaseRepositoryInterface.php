<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function index($subject, $options = []);
    public function show($id);
    public function store($input);
    public function update($input, $id);
    public function delete($ids);
}
