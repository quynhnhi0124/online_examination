<?php

namespace App\Repositories\Role;

use DB;
use App\RoleModel;
use App\Repositories\BaseRepository;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return RoleModel::class;
    }

    public function role()
    {
        return $this->model->select(
                                DB::raw('roles.role as role'),
                                DB::raw("ifnull(COUNT(users.role),0) as number"))
                            ->leftJoin('users','users.role','=','roles.role_num')
                            ->groupBy(DB::raw("role"))
                            ->get();
    }
    
}