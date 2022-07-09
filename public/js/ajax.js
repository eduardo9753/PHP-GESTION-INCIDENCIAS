window.addEventListener('DOMContentLoaded', () => {


    //LOGEO DE USUARIO VIA AJAX
    $('#btn-login').click(function () {
        let datos = $('#frmAjaxLogin').serialize();
        $.ajax({
            type: 'POST',
            url: 'Login',
            data: datos,
            success: function (r) {
                if (r == 1) {
                    console.log('Numero de Retorno : ' + r);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'BIENVENIDO(A)',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "dashboardJefe"; 
                    });
                } else if(r == 2){
                    console.log('Numero de Retorno : ' + r);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'BIENVENIDO(A)',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "dashboardCoordinador"; 
                    });
                } else if(r == 0) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Sus credenciales estan incorrectas!!!!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "index";
                    });
                }
            }
        })
        return false;
    });

});