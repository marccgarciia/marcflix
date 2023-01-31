// //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
function Like() {

    var form = document.getElementById('frm');
    var formdata = new FormData(form);
    var ajax = new XMLHttpRequest();

    console.log(form);

    
    ajax.open("POST", "like.php");

    ajax.onload = function() {
        if (ajax.status === 200) {
            // console.log(ajax.responseText);
            if (ajax.responseText == "OK") {
            } else {

            }
        } else {
            alert('Error');
        }
    };
    ajax.send(formdata);
}