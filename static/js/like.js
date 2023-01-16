//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Like(id) {

    const formdata = new FormData();
    formdata.append('id', id);

    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../controller/controllerlike.php");
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