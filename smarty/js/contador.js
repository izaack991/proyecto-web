window.onload=  function contador(){
      // Obtenemos el valor actual del contador desde el almacenamiento local
      let contador = localStorage.getItem('contador');

      // Si no hay un contador en el almacenamiento local, lo inicializamos a cero
      if (!contador) {
        contador = 3600;
      }

      // Actualizamos el contador en la página

      document.getElementById('contador').innerText = contador;

      // Incrementamos el contador cada segundo
      setInterval(() => {
        contador--;
        document.getElementById('contador').innerText = contador;

        // Guardamos el nuevo valor del contador en el almacenamiento local

        localStorage.setItem('contador', contador);

        // Si han pasado 1 hora, reiniciamos el contador y lo guardamos en el almacenamiento local
        if (contador <= 0) {
          contador = 10;
          localStorage.setItem('contador', contador);
          $('#btn-finalizar').click();
l        }
      }, 1000);}