window.addEventListener('DOMContentLoaded', () => {

    $('#btn-registrar-semaforizacion').click(function () {

        //RADIOS
        const radios = document.getElementsByName('tipo_semaforizacion');

        //VALIDACION DE LIBRO DE RECLAMACIONE
        for (var i = 0; i <  radios.length; i++) {
            if (radios[i].checked) {
              //console.log(radios[i].value);
              if(radios[i].value === 1){
                  console.log('Id: ' + radios[i].value);
              }
              break;
            }
        }

    });

});