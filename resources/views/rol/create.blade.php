@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('rol.index')}}" class="btn btn-primary mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Volver</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <strong class="mt-2 mb-2">Creando Rol:</strong>
            <div class="card">
                <form action="{{route('rol.store')}}" method="post" class="mt-3">
                    @csrf
                    <div class="container mt-2">
                        <div class="form-group">
                            <label for="nombre_input">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre_input" required value="{{old('nombre')}}">
                        </div>
                        <div class="form-group">
                            <label for="username_input">Descripcion</label>
                            <textarea class="form-control" name="descripcion" cols="30" rows="10" id="descripcion_input">{{old('descripcion')}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection