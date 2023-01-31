//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Like(ids) {

    const formdata = new FormData();
    formdata.append('ids', ids);
    


    const ajax = new XMLHttpRequest();
    ajax.open("POST", "../../controller/controllerlike.php");


    console.log(ids);

    
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
            }
        }
    };
    ajax.send(formdata);
}

