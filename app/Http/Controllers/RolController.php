<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use Illuminate\Http\Request;
use App\Repositories\RolRepository\RolRepository;
use Illuminate\Support\Facades\Redirect;

class RolController extends Controller
{
    private $repo_instance;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->repo_instance = RolRepository::GetInstance();
        $roles = $this->repo_instance->getAll();
        return view('rol.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rol.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolRequest $request)
    {
        $this->repo_instance = RolRepository::GetInstance();
        $data = $request->all();
        $this->repo_instance->create($data);
        $this->repo_instance = null;
        return Redirect::to(route('rol.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        $allData = ['rol' => $rol];
        return view('rol.details', $allData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $this->repo_instance = RolRepository::GetInstance();
        $rol = $this->repo_instance->find($request->rol);
        return view('rol.update', ['rol' => $rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolRequest $request, Rol $rol)
    {
        $data = $request->all();
        $this->repo_instance = RolRepository::GetInstance();
        $this->repo_instance->update($rol, $data);
        $this->repo_instance = null;
        return Redirect::to(route('rol.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return back();
    }
}
