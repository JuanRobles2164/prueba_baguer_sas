@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('empleado.index')}}" class="btn btn-primary">Volver</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="#" method="post" class="mt-3">
                    @csrf
                    <div class="container mt-2">
                        <div class="form-group">
                            <label for="nombre_input">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre_input" required value="{{$empleado->nombre}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidos_input">Apellidos</label>
                            <input class="form-control" type="text" name="apellidos" id="apellidos_input" required value="{{$empleado->username}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellidos_input">Genero</label>
                            <input class="form-control" type="text" name="genero" id="genero_input" required value="{{$empleado->genero}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="apellidos_input">Foto de perfil</label>
                            <img src="{{$e->thumbnail}}" width="500" height="600">
                            <input class="form-control" type="text" name="thumbnail" id="apellidos_input" required value="{{$empleado->username}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="celular_input">Celular</label>
                            <input class="form-control" type="text" id="" required value="{{$empleado->celular}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="telefono_input">Telefono</label>
                            <input class="form-control" type="text" id="telefono_input" required value="{{$empleado->telefono}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email_input">E-mail</label>
                            <input class="form-control" type="text" id="email_input" required value="{{$empleado->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="direccion_input">Direccion</label>
                            <input class="form-control" type="text" id="direccion_input" required value="{{$empleado->direccion}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pais_input">Pais</label>
                            <input class="form-control" type="text" id="pais_input" required value="{{$empleado->pais}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="estado_input">Estado</label>
                            <input class="form-control" type="text" id="estado_input" required value="{{$empleado->estado}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ciudad_input">Ciudad</label>
                            <input class="form-control" type="text" id="ciudad_input" required value="{{$empleado->ciudad}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="usuario_input">Usuario</label>
                            <input class="form-control" type="text" id="usuario_input" required value="{{$empleado->usuario}}" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection