<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
	<link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <center>
        <a href="login.php?xd=1">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Soy Empresa</button>
        </a>
        <a href="login.php?xd=2">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Soy Usuario</button>
        </a>
    </center>
</nav>

<div>
<div class="row align-items-center" style="margin-left:10px; margin-left:10px">
  <div class="col">
    <figure class="text-center">
      <h2>Éstas y miles de empresas más tienen las mejores vacantes para ti<h1/>  
    </figure>
  </div>
  <div class="col">
    <input type="image" src="https://canopylab.com/wp-content/uploads/2021/06/Blog-post-Cinco-medidas-para-mantener-un-alto-compromiso-1.jpg" height="400" width="850"/>    
  </div>
</div>
<br><br>


<div class="row align-items-center"  style="margin-left:25px; margin-left:25px">
    <div class="col">
      <input type="image" src="https://www.occ.com.mx/_next/image?url=https%3A%2F%2Fcdn-h4.occ.com.mx%2Fimages%2Fhomepage%2Fbuttons%2Fcolor%2Fcliente-Walmart-Mexico.jpg&w=1920&q=75" style="border: double;" height="200" width="200"/>
    </div>
    <div class="col">
      <input type="image" src="https://www.occ.com.mx/_next/image?url=https%3A%2F%2Fcdn-h4.occ.com.mx%2Fimages%2Fhomepage%2Fbuttons%2Fcolor%2Fcliente-BBVA-Bancomer.jpg&w=1920&q=75" style="border: double;" height="200" width="200"/>
    </div>
    <div class="col">
      <input type="image" src="https://www.occ.com.mx/_next/image?url=https%3A%2F%2Fcdn-h4.occ.com.mx%2Fimages%2Fhomepage%2Fbuttons%2Fcolor%2Fcliente-Grupo-Lala--S-A-.jpg&w=1920&q=75" style="border: double;" height="200" width="200"/>
    </div>
    <div class="col">
      <input type="image" src="https://www.occ.com.mx/_next/image?url=https%3A%2F%2Fcdn-h4.occ.com.mx%2Fimages%2Fhomepage%2Fbuttons%2Fcolor%2Fcliente-EXHIBIDORA-MEXICANA-CINEPOLIS-SA-DE-CV.jpg&w=1920&q=75" style="border: double;" height="200" width="200"/>
    </div>
    <div class="col">
      <input type="image" src="https://www.occ.com.mx/_next/image?url=https%3A%2F%2Fcdn-h4.occ.com.mx%2Fimages%2Fhomepage%2Fbuttons%2Fcolor%2Fcliente-Banamex.jpg&w=1920&q=75" style="border: double;" height="200" width="200"/>
    </div>
    <div class="col">
      <input type="image" src="https://smsarchives.com/wp-content/uploads/2020/04/Kylie-Cosmetics-1.png" style="border: double;" height="200" width="200"/>
    </div>
  </div>
  <br><br>

  
  <div class="row align-items-center"  style="margin-left:35px; margin-rigth:35px">
    <div class="col">
      <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"><h3 class="card-title">Base de datos</h3></div>
        <div class="card-body">
          <h4 class="card-title">19,356</h4>
          <p class="card-text">vacantes actualmente</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"><h3 class="card-title">Administrador</h3></div>
        <div class="card-body">
          <h4 class="card-title">8,329</h4>
          <p class="card-text">vacantes actualmente</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"><h3 class="card-title">Teaster</h3></div>
        <div class="card-body">
          <h4 class="card-title">6,824</h4>
          <p class="card-text">vacantes actualmente</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"><h3 class="card-title">Programador</h3></div>
        <div class="card-body">
          <h4 class="card-title">10,546</h4>
          <p class="card-text">vacantes actualmente</p>
        </div>
      </div>
    </div>
  </div>
  <br><br>

    {foreach $Noticias as $noticia}
      <div class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 40rem; margin:auto; margin-top:30px;">
          <div class="card-body">
            <h4 class="card-title" style="display:inline;">{$noticia.fecha}</h4> <br><br>
              <p class="card-text">{$noticia.nota}</p>
          </div>
      </div>
    {/foreach}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>