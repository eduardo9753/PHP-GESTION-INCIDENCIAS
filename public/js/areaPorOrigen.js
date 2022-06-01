window.addEventListener('DOMContentLoaded', () => {

    //SELECT DE COMBO BOX Y EL ORIGEN PARA APARECER LOS COMBOX
    const cbo_origen = document.querySelector('#cbo_origen'); //combo box


    //COMBO QUE APARECERAN CON EL ORIGEN
    const none_administrativo = document.querySelector('.none-administrativo'); 
    const none_medico = document.querySelector('.none-medico'); 
    const none_asistencial = document.querySelector('.none-asistencial'); 
    const none_otro = document.querySelector('.none-otro'); 
    const none_especialidad = document.querySelector('.none-especialidad'); 


    //HABILIATAR DEMORA - ESTADO : ALTAS (ALTAS MEDICAS)
    const habilitarOrigenArea = () => {
        if (cbo_origen.value == 1) {    //ADMINISTRATIVO
            console.log('SE TIENE QUE VER COMBO DATAADMINISTRATIVO');
            none_administrativo.classList.remove('none-administrativo');
            none_administrativo.classList.add('block');

            none_medico.classList.remove('block');
            none_medico.classList.add('none-medico');
            none_asistencial.classList.remove('block');
            none_asistencial.classList.add('none-asistencial');
            none_otro.classList.remove('block');
            none_otro.classList.add('none-otro');

            //removiendo especialidad
            none_especialidad.classList.add('none-especialidad');
            none_especialidad.classList.remove('block');

            
        } else if(cbo_origen.value == 2){        //MEDICO
            console.log('SE TIENE QUE VER COMBO DATAMEDICO');
            none_medico.classList.remove('none-medico');
            none_medico.classList.add('block');
            
            none_administrativo.classList.remove('block');
            none_administrativo.classList.add('none-administrativo');
            none_asistencial.classList.remove('block');
            none_asistencial.classList.add('none-asistencial');
            none_otro.classList.remove('block');
            none_otro.classList.add('none-otro');

            //apareciendo especilidad
            none_especialidad.classList.remove('none-especialidad');
            none_especialidad.classList.add('block');

        } else if (cbo_origen.value == 3) {  //ASISTENCIAL
            console.log('SE TIENE QUE VER COMBO DATAASISTENCIAL');
            none_asistencial.classList.remove('none-asistencial');
            none_asistencial.classList.add('block');
           
            none_medico.classList.remove('block');
            none_medico.classList.add('none-medico');
            none_administrativo.classList.remove('block');
            none_administrativo.classList.add('none-administrativo');
            none_otro.classList.remove('block');
            none_otro.classList.add('none-otro');

            //removiendo especialidad
            none_especialidad.classList.add('none-especialidad');
            none_especialidad.classList.remove('block');
           
        } else if(cbo_origen.value == 4){         //OTROS
            console.log('SE TIENE QUE VER COMBO DATAOTROS');
            none_otro.classList.remove('none-otro');
            none_otro.classList.add('block');
            
            none_medico.classList.remove('block');
            none_medico.classList.add('none-medico');
            none_administrativo.classList.remove('block');
            none_administrativo.classList.add('none-administrativo');
            none_asistencial.classList.remove('block');
            none_asistencial.classList.add('none-asistencial');

            //removiendo especialidad
            none_especialidad.classList.add('none-especialidad');
            none_especialidad.classList.remove('block');
        }
    }


    //EVENTOS
    cbo_origen.addEventListener('click', habilitarOrigenArea);
});