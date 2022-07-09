window.addEventListener('DOMContentLoaded', () => {

    $(document).ready(function(){
        //COMBO BOX DONDE SE VA PINTAR LOS DATOS
        let cbo_area = $('#cbo_area');

        $('#cbo_origen').click(function(){
            let id_origen = $(this).val();

            console.log('Id Origen: '+ id_origen);

            $.ajax({
                data: {id_origen:id_origen},
                dataType: 'html',
                type: 'POST',
                url: 'origenArea',  //COMBINACION PARA PODER MOSTRAR EL AREA EN FUNCION DEL ORIGEN POR BASE DE DATOS

            }).done(function(data){
                cbo_area.html(data); //PINTANDO LOS DATOS CON AJAX
                console.log('Datos Origen Area: '+ data);
            }); 
        });
    });
});