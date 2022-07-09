window.addEventListener('DOMContentLoaded', () => {

    $(document).ready(function(){
        let causa_especifica = $('#cbo_causa_especifica');

        $('#cbo_causa').click(function(){
            let id_causa = $(this).val();

            $.ajax({
                data: {id_causa:id_causa},
                dataType: 'html',
                type: 'POST',
                url: 'causaEspecifica',  //COMBINACION PARA PODER MOSTRAR LA CAUSA ESPECIFICA EN FUNCION DE LA CAUSA POR BASE DE DATOS

            }).done(function(data){
                causa_especifica.html(data); //PINTANDO LOS DATOS CON AJAX
            });
        });
    });
});