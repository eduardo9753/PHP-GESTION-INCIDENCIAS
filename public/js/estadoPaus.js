window.addEventListener("DOMContentLoaded", () => {
  //COMBO ESTADO PAUS
  let estado_semaforizacion = document.querySelector("#estado_semaforizacion");
  let none_fecha_cierre = document.querySelector(".none-fecha-cierre");
  let none_conclusion = document.querySelector(".none-conclusion");

  const verEstado = () => {
      //PENDIENTE - DESAPARECE: fecha cierre / conclusion
    if (estado_semaforizacion.value == 1) {
        none_fecha_cierre.classList.add('none-fecha-cierre');
        none_conclusion.classList.add('none-conclusion');

        none_fecha_cierre.classList.remove('block');
        none_conclusion.classList.remove('block');
    } else {
        none_fecha_cierre.classList.add('block');
        none_conclusion.classList.add('block');

        none_fecha_cierre.classList.remove('none-fecha-cierre');
        none_conclusion.classList.remove('none-conclusion');
    }
  };

  //AVENTO
  estado_semaforizacion.addEventListener("click", verEstado);
});
