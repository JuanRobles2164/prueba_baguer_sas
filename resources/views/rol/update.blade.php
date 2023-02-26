@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('rol.index')}}" class="btn btn-primary mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Volver</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <strong class="mt-2 mb-2">Editando Rol:</strong>
            <div class="card">
                <form action="{{route('rol.update', $rol->id)}}" method="post" class="mt-3">
                    @csrf
                    {{ method_field('PATCH') }}
                    
                    <input type="hidden" name="id" id="id_hidden" value="{{$rol->id}}">
                    <div class="container mt-2">
                        <div class="form-group">
                            <label for="nombre_input">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre_input" required value="{{$rol->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="username_input">Descripcion</label>
                            <textarea name="descripcion" id="descripcion_input" class="form-control">{{trim($rol->descripcion)}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection