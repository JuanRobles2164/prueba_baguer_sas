@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('usuario.index')}}" class="btn btn-primary mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Volver</a>

    <table class="table mt-4">
        <thead class="thead thead-dark">
            <tr>
                <th></th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles_todos as $rt)
                @php
                    $busquedaRol = $roles_usuario->where('id', $rt->id);
                @endphp
                <tr>
                    <td>
                        @if ($busquedaRol != null && $busquedaRol->count() > 0)
                            <input type="checkbox" name="{{$rt->id}}rol" id="{{$rt->id}}rol_id" checked onclick="clickInput({{$rt->id}}, {{$user->id}}, '{{$rt->id}}rol_id')">
                        @else
                            <input type="checkbox" name="{{$rt->id}}rol" id="{{$rt->id}}rol_id" onclick="clickInput({{$rt->id}}, {{$user->id}}, '{{$rt->id}}rol_id')">
                        @endif
                    </td>
                    <td>
                        {{$rt->id}}
                    </td>
                    <td>
                        {{$rt->nombre}}
                    </td>
                    <td>
                        {{$rt->descripcion}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>

    function clickInput(idRol, idUsuario, idElement){
        let el = document.getElementById(idElement);
        let url = "{{route('usuarios.agregar_quitar_rol')}}";
        let params = "?usuario_id="+idUsuario+"&rol_id="+idRol+"&agregar="+el.checked;
        fetch(url+params)
        .then(res => res.json())
        .then((data) => {
            alert('Rol Modificado con éxito');
        })
    }
</script>
@endsection