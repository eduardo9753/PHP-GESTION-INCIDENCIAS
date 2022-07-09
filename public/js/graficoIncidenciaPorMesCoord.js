window.addEventListener('DOMContentLoaded', () => {
     
    const $grafica = document.querySelector("#grafica");
    const mes = document.querySelector('#txt_mes_actual').value;
    const txt_count_incidencia_cerrado = document.querySelector('#txt_count_incidencia_cerrado_coord').value;
    const txt_count_incidencia_pendiente = document.querySelector('#txt_count_incidencia_pendiente_coord').value;
    
    const txt_count_reclamos_cerrado = document.querySelector('#txt_count_reclamos_cerrado_coord').value;
    const txt_count_reclamos_pendiente = document.querySelector('#txt_count_reclamos_pendiente_coord').value;
    
    const etiquetas = ["RECLAMO CERRADO", "INCIDEN CERRADAS", "INCIDEN SEGUIMIENTO", "RECLAMO SEGUIMIENTO"];
    
    const incidenciaPorMes = () => {
    
        const datosReclamoCerrado = {
            label: "Reclamos cerrados mes:"+ mes + ": " + txt_count_reclamos_cerrado,
            data: [txt_count_reclamos_cerrado,0,0,0], 
            backgroundColor: 'rgba(255, 147, 174, 0.5)', 
            borderColor: 'rgba(255, 147, 174, 1)', 
            borderWidth: 1,
        };
    
        const datosIncidenciasCerradas = {
            label: "Incidencias cerradas mes:"+ mes + ": " + txt_count_incidencia_cerrado,
            data: [0,txt_count_incidencia_cerrado,0,0], 
            backgroundColor: 'rgba(84, 215, 174, 0.5)', 
            borderColor: 'rgba(84, 215, 174, 1)', 
            borderWidth: 1,
        };
    
    
        const datosIncidenciasPendiente = {
            label: "Incidencias Pendientes mes:"+ mes + ": " + txt_count_incidencia_pendiente,
            data: [0,0,txt_count_incidencia_pendiente,0], 
            backgroundColor: 'rgba(54, 162, 235, 0.9)', 
            borderColor: 'rgba(54, 162, 235, 10)', 
            borderWidth: 1,
        };
    
        const datosReclamoPendiente = {
            label: "Reclamos Pendientes mes:"+ mes + ": " + txt_count_reclamos_pendiente,
            data: [0,0,0,txt_count_reclamos_pendiente], 
            backgroundColor: 'rgba(140, 237, 255, 0.9)', 
            borderColor: 'rgba(140, 237, 255, 1)', 
            borderWidth: 1,
        };
    
    
        new Chart($grafica, {
            type: 'bar',// Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosReclamoCerrado,
                    datosIncidenciasCerradas,
                    datosIncidenciasPendiente,
                    datosReclamoPendiente
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    }
    
    //EVENTO
    window.addEventListener('load', incidenciaPorMes);
    
    
    });