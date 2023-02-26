<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\RolRepository\RolRepository;
use App\Repositories\RolUsuarioRepository\RolUsuarioRepository;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{

    private $repo_instance;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->repo_instance = UserRepository::GetInstance();
        $users = $this->repo_instance->getAll();
        $allData = ['users' => $users];
        return view('usuario.index', $allData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string'],
            'username' => ['required', 'unique:users', 'string'],
            'password' => ['required', 'confirmed', 'min:8', 'string']
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->repo_instance = UserRepository::GetInstance();
        $this->repo_instance->create($data);
        $this->repo_instance = null;
        return Redirect::to(route('usuario.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $this->repo_instance = UserRepository::GetInstance();
        $user = $this->repo_instance->find($request->usuario);
        return view('usuario.details', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $this->repo_instance = UserRepository::GetInstance();
        $user = $this->repo_instance->find($request->usuario);
        return view('usuario.update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->repo_instance = UserRepository::GetInstance();
        $request->validate([
            'nombre' => ['required', 'string'],
            'username' => ['required', 'string'],
        ]);
        $data = $request->all();
        $user = $this->repo_instance->find($data['id']);
        if(isset($data['password']) && $data['password'] != null){
            $data['password'] = Hash::make($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        $this->repo_instance->update($user, $data);
        $this->repo_instance = null;
        return Redirect::to(route('usuario.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $this->repo_instance = UserRepository::GetInstance();
        $user = $this->repo_instance->find($request->usuario);
        $this->repo_instance->delete($user);
        return back();
    }

    public function gestionarRoles(User $usuario){
        $this->repo_instance = UserRepository::GetInstance();
        $roles_usuario = $this->repo_instance->getRolesByUserId($usuario->id);
        $this->repo_instance = RolRepository::GetInstance();
        $roles_todos = $this->repo_instance->getAll();
        return view('usuario.roles', [
            'roles_todos' => $roles_todos, 
            'roles_usuario' => $roles_usuario, 
            'user' => $usuario
        ]);
    }

    //variables -> usuario_id (int), rol_id (int), agregar (bool)
    public function agregarQuitarRol(Request $request){
        $this->repo_instance = RolUsuarioRepository::GetInstance();
        $response = null;
        if($request->boolean('agregar')){
            $response = $this->repo_instance->agregarRol($request->rol_id, $request->usuario_id);
        }else{
            $response = $this->repo_instance->quitarRol($request->rol_id, $request->usuario_id);
        }
        return $response;
    }
}
