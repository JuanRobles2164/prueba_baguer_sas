@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{route('usuario.update', $user->id)}}" method="post" class="mt-3">
                    @csrf
                    {{ method_field('PATCH') }}
                    <input type="hidden" name="id" id="id_hidden" value="{{$user->id}}">
                    <div class="container mt-2">
                        <div class="form-group">
                            <label for="nombre_input">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre_input" required value="{{$user->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="username_input">Username</label>
                            <input class="form-control" type="text" name="username" id="username_input" required value="{{$user->username}}">
                        </div>
                        <div class="form-group">
                            <label for="password_input">Contraseña</label>
                            <input class="form-control" type="password" name="password" id="password_input">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation_input">Confirmar contraseña</label>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation_input">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection