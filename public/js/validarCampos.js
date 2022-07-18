window.addEventListener('DOMContentLoaded', () => {

    $('#btn-registrar-semaforizacion').click(function () {
       
        let txt_numero_documento = document.getElementById('txt_numero_documento').value;
        let txt_paciente = document.getElementById('txt_paciente').value;

        //COMBOS
        let cbo_area = document.getElementById('cbo_area');
        let cbo_causa_especifica = document.getElementById('cbo_causa_especifica');

        //VALIDAR LIBRO DE RECLAMACIONES
        let cbo_procedencia = document.getElementById('cbo_procedencia');
        let numero = document.getElementById('txt_numero').value;
        let txt_tomo = document.getElementById('txt_tomo').value;

       
        
        if(cbo_procedencia.value === '1'){
            if(numero.length === 0){
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'EL NUMERO ES OBLIGATORIO!!!!',
                    showConfirmButton: false,
                    timer: 1400
                })
                return false; //PERIMTE NO DEJAR CON EL FLUJO
            }

            if(txt_tomo.length === 0){
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'EL TOMO ES OBLIGATORIO!!!!',
                    showConfirmButton: false,
                    timer: 1400
                })
                return false; //PERIMTE NO DEJAR CON EL FLUJO
            }
            //return false; //PERIMTE NO DEJAR CON EL FLUJO
        }

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