<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Lay dl trong db
     */
    public function get()
    {
        return $this->model->all();
    }
    
    /**
     * Phan trang
     */
    public function paginate(int $limit){
        return $this->model->paginate($limit);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    

    public function create(array $input)
    {
        try {
            $item = $this->create($input);
        } catch (\Exception $exception) {
            Log::error('[Create]:', [$exception->getMessage()]);
            $item = null;       
        }
        return $item;
    }

    public function update($id, array $input)
    {
        $item = $this->find($id);
        try {
            $item->update($input);           
        } catch (\Exception $exception) {
            Log::error('[Update function]:', [$exception->getMessage()]);
            $item = null;
        }
        return $item;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}