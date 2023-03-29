window.onload=  function contador(){
      // Obtenemos el valor actual del contador desde el almacenamiento local
      let contador = localStorage.getItem('contador');

      // Si no hay un contador en el almacenamiento local, lo inicializamos a cero
      if (!contador) {
        contador = 30;
      }
      setInterval(() => {
        contador--;

        // Guardamos el nuevo valor del contador en el almacenamiento local
        localStorage.setItem('contador', contador);

        // Si han pasado 1 hora, reiniciamos el contador y lo guardamos en el almacenamiento local
        if (contador <= 0) {
          contador = 30;
          localStorage.setItem('contador', contador);
          Location.reload();
l        }
      }, 1000);}