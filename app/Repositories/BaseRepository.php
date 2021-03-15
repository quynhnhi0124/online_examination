<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Schema;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;
use Carbon\Carbon;

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

    public function where($index,$op,$value)
    {
        return $this->model->where($index,$op,$value);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    

    public function create(array $input)
    {
        try {
            $item = new $this->model($input);
            $item->save();
        } catch (\Exception $exception) {
            Log::error('[Create]:', [$exception->getMessage()]);
            $item = null;       
        }
        return $item;
    }

    public function insert(array $input)
    {
        $input+=[
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ];
        return $this->model->insert($input);
    }

    public function insertGetId(array $input)
    {
        $input+=[
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ];
        return $this->model->insertGetId($input);
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

    public function updateMultiple($id,$value, array $input)
    {
        return $this->model->where($id,'=',$value)->update($input);
    }

    public function delete($id)
    {
        $item = $this->model->find($id);
        // dd($item);
        // return $item->update(['deleted_at'=>Carbon::now()]);
        return $item->delete();
    }

    public function findBy($attribute, $value){
        return $this->model->where($attribute,'=',$value);
    }

    public function join($table, $first, $second, $type = 'inner')
    {
        if($table.'.deleted_at'){
            return $this->model->join($table, $first , '=', $second)->whereNull($table.'.deleted_at');
        }
        return $this->model->join($table, $first , '=', $second);
    }

    public function joinWhere($table, $first, $second, $attribute,$value)
    {
        if($table.'.deleted_at'){
            return $this->model->join($table,$first,'=',$second)->where($attribute,'=',$value)->whereNull($table.'.deleted_at');
        }
        return $this->model->join($table,$first,'=',$second)->where($attribute,'=',$value);


    }

    public function count(){
        return $this->model->count();
    }

    public function select(array $select){
        return $this->model->select($select);
    }
}