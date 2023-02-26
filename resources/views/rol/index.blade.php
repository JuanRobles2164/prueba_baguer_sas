@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('rol.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>

    <table class="table mt-4">
        <thead class="thead thead-dark">
            <tr>
                <th></th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $r)
                <tr>
                    <td><a href="{{route('roles.destroy', $r)}}" class="btn btn-danger" 
                        onclick="return confirm('¿Desea eliminar este registro?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    <td>{{$r->id}}</td>
                    <td>{{$r->nombre}}</td>
                    <td>
                        <a href="{{route('rol.show', $r->id)}}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{route('rol.edit', $r->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection