window.addEventListener('DOMContentLoaded', () => {

    $('#btn-registrar-semaforizacion').click(function () {
       
        let txt_numero_documento = document.getElementById('txt_numero_documento').value;
        let txt_paciente = document.getElementById('txt_paciente').value;

        //CADENAS
        let cbo_area = document.getElementById('cbo_area');
        let cbo_causa_especifica = document.getElementById('cbo_causa_especifica');


        if(txt_numero_documento.length === 0){
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'NUMERO DE DOCUMENTO VACIO!!!!',
                showConfirmButton: false,
                timer: 1400
            })
            return false; //PERIMTE NO DEJAR CON EL FLUJO
        }

        if(txt_paciente.length === 0) {
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'NOMBRE DEL PACIENTE VACIO!!!!',
                showConfirmButton: false,
                timer: 1400
            })
            return false; //PERIMTE NO DEJAR CON EL FLUJO
        }

        if(cbo_area.value === '80'){ 
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'ASIGNE UNA AREA POR FAVOR!!!!',
                showConfirmButton: false,
                timer: 1400
            })
            return false; //PERIMTE NO DEJAR CON EL FLUJO
        }

        if(cbo_causa_especifica.value === '0'){
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'ASIGNE UNA CAUSA ESPECIFICA POR FAVOR!!!!',
                showConfirmButton: false,
                timer: 1400
            })
            return false; //PERIMTE NO DEJAR CON EL FLUJO
        }
    });

});