window.addEventListener('DOMContentLoaded', () => {

    let flag_notificacion = document.querySelector('#flag_notificacion').value; 

    if(flag_notificacion == 1){
        $.ajax({
            //data: {id_causa:id_causa},
            dataType: 'html',
            type: 'POST',
            url: 'notificacionPorUsuarioIncidenciaPendiente',  //COMBINACION PARA PODER MOSTRAR LA CAUSA ESPECIFICA EN FUNCION DE LA CAUSA POR BASE DE DATOS

        }).done(function(data){
            console.log('Datos: '+data);  //PINTANDO LA DATA
            let datos = JSON.parse(data);  //PARSEANDO LA DATA PARA PODER RECORRERLO EN EL BUCLE
           
            for(let item of datos){       //RECORRIDO DEL BUCLE Y ACCEDIENDO A CADA DATO DE LA DATA PARSEADA
                console.log('Id: '+ item.id);
                console.log('Id: '+ item.paciente);
                console.log('Usuario: ' +item.nombre_usuario);

                let mensaje = item.paciente + ' - ' + 'Estado : Pendiente ' 
                $.notify(mensaje, "warn");
            }
        });
    }
        
});