<?php

namespace App\Repositories\Admin;

use App\Model\Admin\SubjectModel;
use App\Repositories\BaseRepository;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{

    public function getModel()
    {
        return SubjectModel::class;
    }

    public function getProduct()
    {
        // TODO: Implement getProduct() method.
    }
}