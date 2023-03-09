window.onload=  function contadorcleaver(){
      // Obtenemos el valor actual del contadorcleaver desde el almacenamiento local
      let contadorcleaver = localStorage.getItem('contadorcleaver');

      // Si no hay un contadorcleaver en el almacenamiento local, lo inicializamos a cero
      if (!contadorcleaver) {
        contadorcleaver = 3600;
      }

      // Actualizamos el contadorcleaver en la página

      document.getElementById('contador').innerText = contadorcleaver;

      // Incrementamos el contadorcleaver cada segundo
      setInterval(() => {
        contadorcleaver--;
        document.getElementById('contador').innerText = contadorcleaver;

        // Guardamos el nuevo valor del contadorcleaver en el almacenamiento local

        localStorage.setItem('contadorcleaver', contadorcleaver);

        // Si han pasado 1 hora, reiniciamos el contadorcleaver y lo guardamos en el almacenamiento local
        if (contadorcleaver <= 0) {
          contadorcleaver = 10;
          localStorage.setItem('contadorcleaver', contadorcleaver);
          $('#btn-finalizar').click();
l        }
      }, 1000);}