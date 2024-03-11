window.onload =  function contadormoss(){
      // Obtenemos el valor actual del contadormoss desde el almacenamiento local
      let contadormoss = localStorage.getItem('contadormoss');

      // Si no hay un contadormoss en el almacenamiento local, lo inicializamos a cero
      if (!contadormoss) {
        contadormoss = 1200;
      }

      // Actualizamos el contadormoss en la página

      document.getElementById('contador').innerText = contadormoss;

      // Incrementamos el contadormoss cada segundo
      setInterval(() => {
        contadormoss--;
        document.getElementById('contador').innerText = contadormoss;

        // Guardamos el nuevo valor del contadormoss en el almacenamiento local

        localStorage.setItem('contadormoss', contadormoss);

        // Si han pasado 1 hora, reiniciamos el contadormoss y lo guardamos en el almacenamiento local
        if (contadormoss <= 0) {
          contadormoss = 1200;
          localStorage.setItem('contadormoss', contadormoss);
          $('#btnfinalizar').click();
l        }
      }, 1000);}