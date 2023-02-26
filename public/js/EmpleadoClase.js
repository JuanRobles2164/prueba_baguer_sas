class Empleado{
    constructor(data, iterador){
        this.id = iterador;
        this.nombres = data.nombres;
        this.apellidos = data.apellidos;
        this.genero = data.genero;
        this.thumbnail_large = data.thumbnail_large;
        this.thumbnail_small = data.thumbnail_small;
        this.celular = data.celular;
        this.telefono = data.telefono;
        this.email = data.email;
        this.direccion = data.direccion;
        this.pais = data.pais;
        this.estado = data.estado;
        this.usuario = data.usuario;
    }
}