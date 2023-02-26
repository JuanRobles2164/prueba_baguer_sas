
async function cargarDataPagina() {
    //Obtiene 10 personas de nacionalidad española
    let url = "https://randomuser.me/api/?results=10&nat=es"
    fetch(url)
    .then(res => res.json())
    .then((response) => {
        let iterador = 1;
        response.results.forEach(e => {
            //Crea el objeto
            let objStructure = {
                id : iterador,
                nombres : e.name.first,
                apellidos : e.name.last,
                genero : e.gender,
                thumbnail_large : e.picture.large,
                thumbnail_small : e.picture.thumbnail,
                celular : e.cell,
                telefono : e.phone,
                email : e.email,
                direccion : (e.location.city+", "+e.location.state+", "+e.location.street.name+", número "+e.location.street.number+". "+e.location.country),
                pais : e.location.country,
                estado : e.location.state,
                usuario : e.login.username
            }

            let plantillaRowTabla = `
            <tr id=":iteradorElemento">
                <input type="hidden" name="objeto" value=':json_objeto'>
                <td>
                    :iterador
                </td>
                <td>
                    <img src=":thumbnail">
                    :nombres
                </td>
                <td>
                    :apellidos
                </td>
                <td>
                    <a href="#" onclick="detallesModal(':iteradorElemento')">Detalles</a>
                </td>
            </tr>
            `;

            let cadenaConcatenar = plantillaRowTabla.replace(/:iterador/g, iterador)
                                                    .replace(":json_objeto", JSON.stringify(objStructure))
                                                    .replace(/:thumbnail/g, objStructure.thumbnail_small)
                                                    .replace(/:nombres/g, objStructure.nombres)
                                                    .replace(/:apellidos/g, objStructure.apellidos)
            let contenedor = document.getElementById('tbodycontenido');
            contenedor.innerHTML += cadenaConcatenar;

            iterador++;
        });
    })
}

async function detallesModal(idElemento){
    let elemento = document.getElementById(idElemento);
    let objData = new Empleado(JSON.parse(elemento.children[0].value));

    let modalElement = document.getElementById('exampleModal');
    let inputs = modalElement.querySelectorAll('input, img');

    inputs[0].value = objData.nombres;
    inputs[1].value = objData.apellidos;
    inputs[2].value = objData.genero;
    inputs[3].value = objData.usuario;
    inputs[4].value = objData.telefono;
    inputs[5].value = objData.estado;
    inputs[6].value = objData.celular;
    inputs[7].value = objData.pais;
    inputs[8].value = objData.email;
    inputs[9].value = objData.direccion;
    inputs[10].src = objData.thumbnail_large;

    $('#exampleModal').modal('show');

}

window.onload = cargarDataPagina;