@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('usuario.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>

    <table class="table mt-4">
        <thead class="thead thead-dark">
            <tr>
                <th></th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Username</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td><a href="{{route('usuarios.destroy', $u)}}" class="btn btn-danger"
                        onclick="return confirm('¿Desea eliminar este registro?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    <td>{{$u->id}}</td>
                    <td>{{$u->nombre}}</td>
                    <td>{{$u->username}}</td>
                    <td>
                        <a href="{{route('usuario.show', $u->id)}}" class="btn btn-primary">
                            <i class="fa fa-eye" aria-hidden="true">&nbsp;</i>
                            </a>
                        <a href="{{route('usuario.edit', $u->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="{{route('usuarios.gestionar_roles', $u)}}" class="btn btn-dark"><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;Roles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection