//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: CAMAREROS
function ListarCrud(filtro) {

    let resultado = document.getElementById("resultadomesa");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudrevision.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        ListarCrud('');
    } else {
        ListarCrud(filtro);
    }
});

ListarCrud('');





function ListarCrud2(filtro) {

    let resultado = document.getElementById("resultadomesa2");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudregistrados.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            resultado.innerHTML = ajax.responseText;
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);
}

buscar.addEventListener("keyup", () => {
    const filtro = buscar.value;
    if (filtro == "") {
        ListarCrud2('');
    } else {
        ListarCrud2(filtro);
    }
});

ListarCrud2('');
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Eliminar(id_revision) {

    const formdata = new FormData();
    formdata.append('id_revision', id_revision);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllereliminarrevision.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Usuario denegado!',
                    showConfirmButton: false,
                    timer: 1500,
                    padding: '10px'
                    });                
                ListarCrud('');
            }
        }
    };
    ajax.send(formdata);
}

function Eliminar2(id_usuarios) {

    const formdata = new FormData();
    formdata.append('id_usuarios', id_usuarios);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllereliminarregistrados.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Usuario denegado!',
                    showConfirmButton: false,
                    timer: 1500,
                    padding: '10px'
                    });                
                ListarCrud2('');
            }
        }
    };
    ajax.send(formdata);
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Aceptar(id_revision) {

    const formdata = new FormData();
    formdata.append('id_revision', id_revision);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controlleraceptarrevision.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Usuario Aceptado!',
                    showConfirmButton: false,
                    timer: 1500,
                    padding: '10px'
                    });                
                ListarCrud('');
            }
        }
    };
    ajax.send(formdata);
}