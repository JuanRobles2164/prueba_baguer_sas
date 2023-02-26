@extends('layouts.app')

@section('content')
<div class="container">

    <table class="table mt-4">
        <thead class="thead thead-dark">
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody id="tbodycontenido">
                
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nombres_details">Nombres</label>
                        <input class="form-control" type="text" id="nombres_details" disabled>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="apellidos_details">Apellidos</label>
                        <input class="form-control" type="text" id="apellidos_details" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="genero_details">Genero</label>
                        <input class="form-control" type="text" id="genero_details" disabled>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="usuario_details">Usuario</label>
                        <input class="form-control" type="text" id="usuario_details" disabled>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="telefono_details">Telefono</label>
                        <input class="form-control" type="text" id="telefono_details" disabled>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="estado_details">Estado</label>
                        <input class="form-control" type="text" id="estado_details" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-6">
                    <div class="form-group">
                        <label for="celular_details">Celular</label>
                        <input class="form-control" type="text" id="celular_details" disabled>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="pais_details">Pais</label>
                        <input class="form-control" type="text" id="pais_details" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email_details">Email</label>
                        <input class="form-control" type="text" id="email_details" disabled>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label for="direccion_details">Direccion</label>
                        <input class="form-control" type="text" id="direccion_details" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <div class="form-group">
                        <label class="col-6" for="imagen_details">Imagen (Large):</label>
                        <img class="col-6" src="" id="imagen_details" class="center">
                    </div>
                </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<script src="{{asset("js/EmpleadoClase.js")}}"></script>
<script src="{{asset("js/empleados.js")}}"></script>
@endsection