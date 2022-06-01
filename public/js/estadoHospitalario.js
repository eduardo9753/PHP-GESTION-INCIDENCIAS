window.addEventListener("DOMContentLoaded", () => {
  //COMBO ESTADO PAUS
  let cbo_servicio = document.querySelector("#cbo_servicio");
  let none_habitacion = document.querySelector(".none-habitacion");

  const verEstado = () => {
    //PENDIENTE - DESAPARECE: fecha cierre / conclusion
    if (cbo_servicio.value == 4) {
      none_habitacion.classList.add("block");
      none_habitacion.classList.remove("none-habitacion");
    } else {
      none_habitacion.classList.add("none-habitacion");
      none_habitacion.classList.remove("block");
    }
  };

  //AVENTO
  cbo_servicio.addEventListener("click", verEstado);
});
