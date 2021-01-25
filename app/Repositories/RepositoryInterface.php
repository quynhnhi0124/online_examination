<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;

interface RepositoryInterface
{
    public function get();

    public function paginate(int $limit);

    public function find($id);

    public function create(array $input);

    public function update($id, array $input);

    public function delete($id);
}