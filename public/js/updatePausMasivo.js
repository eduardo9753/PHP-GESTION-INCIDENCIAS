window.addEventListener("DOMContentLoaded", () => {
    
    $('#btn_update').click(function(){
            let id = [];               //arreglo para guardar los datos
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val(); //guardamos cada valor de los id seleccionados
            })

            if(id.length > 0){      //validamos que almenos tenga un id disponible
                $.ajax({
                    url: 'updateLaboratorio',
                    method: 'POST',
                    data: {id:id},

                    success: function (r) {
                        if (r == 1) {
                            console.log('Numero de Retorno : ' + r);
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'BIENVENID@',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                window.location = "InidenciaPendiente"; 
                            });
                        } else if(r == 0) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Sus credenciales estan incorrectas!!!!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                window.location = "InidenciaPendiente";
                            });
                        }
                    }
                })
                return false;
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'SELECCIONE AL MENOS UN EXAMEN',
                    showConfirmButton: false,
                    timer: 1200
                })
                return false; //PERIMTE NO DEJAR CON EL FLUJO
            }
    })
});
  