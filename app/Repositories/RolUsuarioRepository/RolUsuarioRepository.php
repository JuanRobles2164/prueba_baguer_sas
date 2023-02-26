<?php

namespace App\Repositories\RolUsuarioRepository;

use App\Models\Rol;
use App\Models\RolUsuario;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RolUsuarioRepository extends BaseRepository{
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
        return new RolUsuario;
    }

    public function getAll($paginate = 10){
        return $this->getModel()->paginate($paginate);
    }

    public function findByParams($params){
        
    }

    public function agregarRol($rolId, $userId){
        $data = [
            'rol_id' => $rolId,
            'usuario_id' => $userId
        ];
        $this->create($data);
        return true;
    }
    public function quitarRol($rolId, $userId){
        $this->getModel()->where(['rol_id' => $rolId, 'usuario_id' => $userId])->delete();
        return true;
    }
}