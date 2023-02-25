<?php
namespace App\Repositories;

use Exception;

abstract class BaseRepository{
    private function __construct(){

    }

    //Abstract Operations
    abstract public function getModel();

    /**
     * Dependiendo de los valores que tenga este array, se buscará bajo ciertos criterios u otros
     * @param array $params arreglo de parámetros
     * @return Illuminate\Database\Eloquent\Collection
     */
    abstract public function findByParams($params);

    public function firstRecord(){
        return $this->getModel()->first();
    }
    
    public function firstOrCreate($params){
        return $this->getModel()->firstOrCreate($params);
    }
    //Create Operations
    public function create($object){
        return $this->getModel()->create($object);
    }
    //Read Operations
    public function find($id){
        return $this->getModel()->find($id);
    }

    public function getAll($paginate = 10){
        return $this->getModel()->paginate($paginate);
    }

    //Update Operations
    public function update($object, $data){
        $object->fill($data);
        $object->save();
        return $object;
    }

    //Delete Operations
    public function delete($object){
        try{
            $object->delete();
        }catch(Exception $e){
            return false;
        }
        return true;
    }
}