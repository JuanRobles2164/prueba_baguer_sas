@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('usuario.create')}}" class="btn btn-primary">Crear</a>

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
                    <td><a href="{{route('usuarios.destroy', $u)}}" class="btn btn-danger">Eliminar</a></td>
                    <td>{{$u->id}}</td>
                    <td>{{$u->nombre}}</td>
                    <td>{{$u->username}}</td>
                    <td>
                        <a href="{{route('usuario.show', $u->id)}}" class="btn btn-primary">Detalles</a>
                        <a href="{{route('usuario.edit', $u->id)}}" class="btn btn-warning">Actualizar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection