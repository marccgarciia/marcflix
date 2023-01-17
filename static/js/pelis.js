// function ListarCrud() {

//     let resultado = document.getElementById("resultadomesa");

//     let formdata = new FormData();

//     const ajax = new XMLHttpRequest();
//     ajax.open('POST', '../controller/controllercrudpelis.php');
//     ajax.onload = function() {
//         if (ajax.status == 200) {
//             resultado.innerHTML = ajax.responseText;
//         } else {
//             resultado.innerText = 'Error';
//         }
//     }
//     ajax.send(formdata);
// }


// ListarCrud('');



function ListarCrud(filtro) {

    let resultado = document.getElementById("resultadomesa");

    let formdata = new FormData();
    formdata.append('filtro', filtro);

    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../controller/controllercrudpelis.php');
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
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Eliminar(id) {

    const formdata = new FormData();
    formdata.append('id', id);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllercrudeliminarpelis.php");
    ajax.onload = function() {
        if (ajax.status === 200) {
            if (ajax.responseText == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡SERIE / PELI ELIMNADO/A!',
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