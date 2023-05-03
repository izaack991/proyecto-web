<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Usuario</title>
        <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
        <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">

    </head>

    <body>
        
        {*Conexion a un archivo javascript para la curp*}
        <script src="../smarty/js/curp.js"></script>
        
        {*Form para el registrod de usuarios*}
        <form method="POST">

            {*Card del registro de usuarios*}
            <div class="card  mb-3" style="max-width: 50rem; margin:auto; margin-top:50px;">
                <FONT COLOR="black">
                    {if $irol == 1}
                    <div class="card-header bg-primary" align="center">REGISTRO DE NUEVA EMPRESA</div>
                    {else}
                    <div class="card-header bg-primary" align="center">REGISTRO DE NUEVO USUARIO</div>
                    {/if}
                </FONT>
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <label></label>
                    <label>Los campos marcados con asterisco (*) son obligatorios</label>
                    <br>
                    <br>

                    {*Campos para el registro de usuarios o empresas*}
                    <label>Seleccione el formulario a realizar*</label>
                    <br>
                    {if $irol == 1}
                    <input type="radio" name="preg1" value="A" onload="activarUsuario()" visible="false" id="miFormulario"checked="true" hidden="true"> <label hidden="true">USUARIO</label><br>
                    {else}
                    <input type="radio" name="preg1" value="B" onload="activarEmpresa()" visible="false" id="miFormulario"checked="true" hidden="true"> <label hidden="true">EMPRESA</label><br><br>
                    {/if}

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre: *</label><br>
                            <input class="form-control" type="text" name="txt_NOMBRE" class="texto" id="nombre"placeholder="Escriba el Nombre" pattern="[A-Z a-z]+" required="true"><br>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellidos: *</label><br>
                            <input class="form-control" type="text" name="txt_APELLIDOS" class="texto" id="apellido"placeholder="Escriba sus Apellidos" pattern="[A-Z a-z]+" required="true"><br>
                        </div>
                    </div>

                    <label>Razón Social: *</label><br>
                    <input class="form-control" type="text" name="txt_razon" class="texto" id="razon"placeholder="Ingresa el Nombre de la Empresa" pattern="[A-Z a-z]+" required="true">

                    <label for="formFile" class="form-label mt-4">Seleccionar Imagen de Perfil: *</label>
                    <input class="form-control" type="file" name="txtruta" id="txtruta"><br>

                    <label>Correo Electronico: *</label><br>
                    <input class="form-control" type="email" name="txt_CORREO" class="texto" id="correo"placeholder="Ejemplo@dominio.com" pattern=".+.com" required><br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dateFECHA">Seleccione su Fecha de Nacimineto: *</label><br>
                            <input class="form-control" type="date" id="dateFECHA" name="dateFECHA" value="2022-01-01">
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <label>CURP: *</label><br>
                            <input class="form-control" type="text" id="curp" name="txt_CURP" oninput="validarInput(this)"maxLength="18" minLength="18" pattern="[A-Z0-9]+" style="width:100%;"placeholder="Ingrese su CURP">
                            <pre id="resultado"></pre>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contraseña: *</label><br>
                            <input class="form-control" type="password" name="txt_PASSWORD" class="texto" minlength="8" id="contrasena" maxLength="30" placeholder="Escriba la Contraseña" required="true"><br>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirme Contraseña: *</label><br>
                            <input class="form-control" type="password" name="txt_PASSWORD2" class="texto" minlength="8" id="contrasena1" maxLength="30" placeholder="Confirme la Contraseña" required="true"><br>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-3">
                            <label>Sexo: *</label><br>
                            <select class="btn btn-light disabled" name="cmb_SEXO" id="sexo">
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">Otro</option>
                            </select><br>
                        </div>
                        <div class="col">
                            <label>Region: *</label><br>
                            <select class="btn btn-light disabled" name="cmb_REGION" id="region">
                                <div>
                                    <option value="54">Argentina</option>
                                    <option value="591">Bolivia</option>
                                    <option value="55">Brasil</option>
                                    <option value="56">Chile</option>
                                    <option value="57">Colombia</option>
                                    <option value="506">Costa Rica</option>
                                    <option value="53">Cuba</option>                                    
                                    <option value="593">Ecuador</option>
                                    <option value="503">El Salvador</option>
                                    <option value="1473">Granada</option>
                                    <option value="502">Guatemala</option>
                                    <option value="592">Guayana</option>
                                    <option value="509">Haití</option>
                                    <option value="504">Honduras</option>
                                    <option value="1876">Jamaica</option>
                                    <option value="52">México</option>
                                    <option value="505">Nicaragua</option>
                                    <option value="507">Panamá</option>
                                    <option value="595">Paraguay</option>
                                    <option value="51">Perú</option>
                                    <option value="1">Puerto Rico</option>
                                    <option value="1809">República Dominicana</option>
                                    <option value="597">Surinam</option>
                                    <option value="598">Uruguay</option>
                                    <option value="58">Venezuela</option>
                                </div>
                            </select><br>
                        </div>
                            <div class="col">
                                <label>Telefono: *</label><br>
                                <input class="form-control" type="text" name="txt_TELEFONO" class="texto" id="telefono"minlength="10" maxLength="10" placeholder="Escriba su Número" required="true"><br>
                            </div>
                    </div>
                            <label>Domicilio: *</label><br>
                            <input class="form-control" type="text" name="txt_DOMICILIO" class="texto" id="domicilio" placeholder="Escriba su Domicilio" required="true"><br>

                        <center>
                            <button class="btn btn-primary" type="submit">GUARDAR</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='login.php?xd=1'">Regresaral Login</button>
                        </center>
                    </div>
        </form>

        {*Conexion de librerias de JavaScript y bootstrap*}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        {*Codigo en JavaScript para activar y desactivar campos*}
        <script type="text/javascript">
            function activarUsuario() {
                document.getElementById('razon').disabled = true

            }

            function activarEmpresa() {
                document.getElementById('nombre').disabled = true
                document.getElementById('apellido').disabled = true
                document.getElementById('dateFECHA').disabled = true
                document.getElementById('curp').disabled = true
                document.getElementById('sexo').disabled = true
            }
        </script>

    </body>

</html>