<?php

namespace App\Repositories\EmpleadoRepository;

use App\Models\Empleado;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EmpleadoRepository extends BaseRepository{
    private static $instance;
    private function __construct(){

    }
    public static function GetInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getModel()
    {
        return new Empleado;
    }

    public function getAll($paginate = 10){
        return $this->getModel()->paginate($paginate);
    }

    public function findByParams($params){
        
    }
}