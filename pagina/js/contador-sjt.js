window.onload=  function contadorjst(){
      // Obtenemos el valor actual del contadorjst desde el almacenamiento local
      let contadorjst = localStorage.getItem('contadorjst');

      // Si no hay un contadorjst en el almacenamiento local, lo inicializamos a cero
      if (!contadorjst) {
        contadorjst = 600;
      }

      // Actualizamos el contadorjst en la página

      document.getElementById('contador').innerText = contadorjst;

      // Incrementamos el contadorjst cada segundo
      setInterval(() => {
        contadorjst--;
        document.getElementById('contador').innerText = contadorjst;

        // Guardamos el nuevo valor del contadorjst en el almacenamiento local

        localStorage.setItem('contadorjst', contadorjst);

        // Si han pasado 1 hora, reiniciamos el contadorjst y lo guardamos en el almacenamiento local
        if (contadorjst <= 0) {
          contadorjst = 600;
          localStorage.setItem('contadorjst', contadorjst);
          $('#btnfinalizar').click();
l        }
      }, 1000);}