<?php

namespace App\Repositories\UserRepository;

use App\Models\Rol;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository{
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
        return new User;
    }

    public function getByUsername($username){
        return $this->getModel()->where('username', $username)->first();
    }

    public function authenticate($user){
        $userSearch = DB::table('users')->where([
            'username' => $user['username'],
        ])->first();
        if($userSearch != null){
            $response = Hash::check($user['password'], $userSearch->password);
            return $response;
        }
        return false;
    }

    public function getAll($paginate = 10){
        return $this->getModel()->paginate($paginate);
    }

    public function getRolesByUserId($userId){
        return DB::table('roles')
                ->join('rol_usuarios', 'rol_usuarios.rol_id', '=','roles.id')
                ->where('rol_usuarios.usuario_id', $userId)
                ->get('roles.*');
    }

    public function findByParams($params){
        
    }
}