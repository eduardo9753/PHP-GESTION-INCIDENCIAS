window.addEventListener("DOMContentLoaded", () => {
  //COMBO ESTADO PAUS
  let cbo_procedencia = document.querySelector("#cbo_procedencia");
  let none_numero = document.querySelector(".none-numero");
  let none_tomo = document.querySelector(".none-tomo");

  const verEstado = () => {
      //PENDIENTE - DESAPARECE: fecha cierre / conclusion
    if (cbo_procedencia.value == 1) {        //LIBRO DE RECLAMACIONES          
      none_numero.classList.add('block');
      none_tomo.classList.add('block');

      none_numero.classList.remove('none-numero');
      none_tomo.classList.remove('none-tomo');
      console.log(cbo_procedencia.value);
        
    } else {
      none_numero.classList.add('none-numero');       //AGREGAMOS EL hiden de CSS A LA CAJA NUMERO
      none_tomo.classList.add('none-tomo');           //AGREGAMOS EL hiden de CSS A LA CAJA TOMO

      none_numero.classList.remove('block');                //QUITAMOS EL BLOCK  
      none_tomo.classList.remove('block');                  //QUITAMOS EL BLOCK
      console.log(cbo_procedencia.value);
    }
  };

  //AVENTO
  cbo_procedencia.addEventListener("click", verEstado);
});
