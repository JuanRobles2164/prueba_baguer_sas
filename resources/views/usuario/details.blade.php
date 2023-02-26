@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('usuario.index')}}" class="btn btn-primary">Volver</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="#" method="post" class="mt-3">
                    @csrf
                    {{ method_field('PATCH') }}
                    <input type="hidden" name="id" id="id_hidden" value="{{$user->id}}">
                    <div class="container mt-2">
                        <div class="form-group">
                            <label for="nombre_input">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre_input" required value="{{$user->nombre}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="username_input">Username</label>
                            <input class="form-control" type="text" name="username" id="username_input" required value="{{$user->username}}" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection