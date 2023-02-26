@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('rol.index')}}" class="btn btn-primary mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Volver</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="#" method="post" class="mt-3">
                    @csrf
                    <div class="container mt-2">
                        <div class="form-group">
                            <label for="nombre_input">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre_input" value="{{$rol->nombre}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="username_input">Descripcion</label>
                            <input class="form-control" type="text" name="username" id="username_input" value="{{$rol->descripcion}}" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection