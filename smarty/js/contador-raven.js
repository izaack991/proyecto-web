window.onload =  function contadorraven(){
      // Obtenemos el valor actual del contadorraven desde el almacenamiento local
      let contadorraven = localStorage.getItem('contadorraven');

      // Si no hay un contadorraven en el almacenamiento local, lo inicializamos a cero
      if (!contadorraven) {
        contadorraven = 1200;
      }

      // Actualizamos el contadorraven en la página

      document.getElementById('contador').innerText = contadorraven;

      // Incrementamos el contadorraven cada segundo
      setInterval(() => {
        contadorraven--;
        document.getElementById('contador').innerText = contadorraven;

        // Guardamos el nuevo valor del contadorraven en el almacenamiento local

        localStorage.setItem('contadorraven', contadorraven);

        // Si han pasado 1 hora, reiniciamos el contadorraven y lo guardamos en el almacenamiento local
        if (contadorraven <= 0) {
          contadorraven = 1200;
          localStorage.setItem('contadorraven', contadorraven);
          $('#btnfinalizar').click();
l        }
      }, 1000);}