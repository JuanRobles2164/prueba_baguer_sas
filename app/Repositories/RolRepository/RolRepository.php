<?php

namespace App\Repositories\RolRepository;

use App\Models\Rol;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RolRepository extends BaseRepository{
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
        return new Rol;
    }

    public function getAll($paginate = 10){
        return $this->getModel()->paginate($paginate);
    }

    public function findByParams($params){
        
    }
}