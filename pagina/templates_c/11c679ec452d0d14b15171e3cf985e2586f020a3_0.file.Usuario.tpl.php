<?php
/* Smarty version 4.2.0, created on 2022-10-19 19:54:47
  from 'C:\xampp\htdocs\proyecto-web\smarty\templates\Usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_635039e71093e5_86049555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11c679ec452d0d14b15171e3cf985e2586f020a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto-web\\smarty\\templates\\Usuario.tpl',
      1 => 1666201650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_635039e71093e5_86049555 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>

<link id="theme-style" rel="stylesheet" href="../../pagina/assets/css/devresume.css">
<link id="theme-style" rel="stylesheet" href="../../pagina/assets/css/theme-1.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
</head>
<body>
    <form action="Usuario.php" method="POST">
        <div> 
            <label>Registrar Usuario</label>
            <br>
            <label>Los campos marcados con asterisco son obligatorios*</label>
            <br>
            <label>Nombre: *</label><br>
            <input type="text" name="txt_NOMBRE" class="texto" placeholder="Escriba el Nombre" required="true"><br>
            <label>Apellidos: *</label><br>
            <input type="text" name="txt_APELLIDOS" class="texto" placeholder="Escriba sus Apellidos" required="true"><br>
            <label>Correo Electronico: *</label><br>
            <input type="text" name="txt_CORREO" class="texto" placeholder="Escriba su Correo" required="true"><br>
            <label for="dateFECHA">Seleccione su Fecha de Nacimineto: *</label><br>
            <input type="date" id="dateFECHA" name="dateFECHA"
                   value="2022-01-01"
                   min="2022-01-01" max="2022-12-31">
            <br>
            <label>CURP: *</label><br>
            <input type="text" name="txt_CURP" class="texto" placeholder="Escriba su CURP" required="true"><br>
            <label>Contrasena: *</label><br>
            <input type="password" name="txt_PASSWORD" class="texto" minlength="8" maxLength="30" placeholder="Escriba la Contrasena" required="true"><br>
            <label>Confirme Contrasena: *</label><br>
            <input type="password" name="txt_PASSWORD2" class="texto" minlength="8" maxLength="30" placeholder="Confirme la Contrasena" required="true"><br>
            <label>Sexo: *</label><br>
            <select name="cmb_SEXO">
                <option value = "1">Masculino</option>
                <option value = "2">Femenino</option>
                <option value = "3">Otro</option>
            <select><br>    
            <label>Region: *</label><br>
            <select name="cmb_REGION">
                <div>
                <option value="93">Afganistán</option>
                <option value="355">Albania</option>
                <option value="213">Alemania</option>∫
                <option value="1 (684)">Andorra</option>
                <option value="244">Angola</option>
                <option value="1264">Anguilla</option>
                <option value="672">Antártida</option>
                <option value="1268">Antigua y Barbuda</option>
                <!--<option value="">Antillas Holandesas</option>-->
                <option value="966">Arabia Saudí</option>
                <option value="213">Argelia</option>
                <option value="54">Argentina</option>
                <option value="374">Armenia</option>
                <option value="61">Australia</option>
                <option value="43">Austria</option>
                <option value="994">Azerbaiyán</option>
                <option value="1242">Bahamas</option>
                <option value="973">Bahrein</option>
                <option value="880">Bangladesh</option>
                <option value="1246">Barbados</option>
                <option value="32">Bélgica</option>
                <option value="501">Belice</option>
                <option value="229">Benin</option>
                <option value="1441">Bermudas</option>
                <!--<option value="">Bielorrusia</option>-->
                <!--<option value="">Birmania</option>-->
                <option value="591">Bolivia</option>
                <option value="387">Bosnia y Herzegovina</option>
                <option value="267">Botswana</option>
                <option value="55">Brasil</option>
                <option value="673">Brunei</option>
                <option value="359">Bulgaria</option>
                <option value="226">Burkina Faso</option>
                <option value="257">Burundi</option>
                <option value="975">Bután</option>
                <option value="238">Cabo Verde</option>
                <option value="855">Camboya</option>
                <option value="237">Camerún</option>
                <option value="1">Canadá</option>
                <option value="235">Chad</option>
                <option value="56">Chile</option>
                <option value="86">China</option>
                <option value="357">Chipre</option>
                <!--<option value="">Ciudad del Vaticano (Santa Sede)</option>-->
                <option value="57">Colombia</option>
                <option value="269">Comores</option>
                <!--<option value="">Congo</option>-->
                <!--<option value="">Congo, República Democrática del</option>-->
                <!--<option value="">Corea</option>-->
                <!--<option value="">Corea del Norte</option>-->
                <option value="225">Costa de Marfíl</option>
                <option value="506">Costa Rica</option>
                <option value="385">Croacia (Hrvatska)</option>
                <option value="53">Cuba</option>
                <option value="45">Dinamarca</option>
                <option value="253">Djibouti</option>
                <option value="1767">Dominica</option>
                <option value="593">Ecuador</option>
                <option value="20">Egipto</option>
                <option value="503">El Salvador</option>
                <option value="971">Emiratos Árabes Unidos</option>
                <option value="291">Eritrea</option>
                <option value="386">Eslovenia</option>
                <option value="34">España</option>
                <option value="1">Estados Unidos</option>
                <option value="372">Estonia</option>
                <option value="251">Etiopía</option>
                <option value="679">Fiji</option>
                <option value="63">Filipinas</option>
                <option value="358">Finlandia</option>
                <option value="33">Francia</option>
                <option value="241">Gabón</option>
                <option value="220">Gambia</option>
                <option value="995">Georgia</option>
                <option value="233">Ghana</option>
                <option value="350">Gibraltar</option>
                <option value="1473">Granada</option>
                <option value="30">Grecia</option>
                <option value="299">Groenlandia</option>
                <option value="590">Guadalupe</option>
                <option value="1671">Guam</option>
                <option value="502">Guatemala</option>
                <option value="592">Guayana</option>
                <!--<option value="">Guayana Francesa</option>-->
                <option value="224">Guinea</option>
                <option value="240">Guinea Ecuatorial</option>
                <option value="245">Guinea-Bissau</option>
                <option value="509">Haití</option>
                <option value="504">Honduras</option>
                <option value="36">Hungría</option>
                <option value="91">India</option>
                <option value="62">Indonesia</option>
                <option value="964">Irak</option>
                <option value="98">Irán</option>
                <!--<option value="">Irlanda</option>-->
                <!--<option value="">Isla Bouvet</option>-->
                <!--<option value="">Isla de Christmas</option>-->
                <option value="354">Islandia</option>
                <option value="1345">Islas Caimán</option>
                <option value="682">Islas Cook</option>
                <!--<option value="">Islas de Cocos o Keeling</option>-->
                <option value="298">Islas Faroe</option>
                <!--<option value="">Islas Heard y McDonald</option>-->
                <option value="500">Islas Malvinas</option>
                <option value="1670">Islas Marianas del Norte</option>
                <option value="692">Islas Marshall</option>
                <option value="808">Islas menores de Estados Unidos</option>
                <!--<option value="">Islas Palau</option>-->
                <option value="677">Islas Salomón</option>
                <!--<option value="">Islas Svalbard y Jan Mayen</option>-->
                <!--<option value="">Islas Tokelau</option>-->
                <option value="1649">Islas Turks y Caicos</option>
                <option value="1340">Islas Vírgenes (EEUU)</option>
                <option value="1284">Islas Vírgenes (Reino Unido)</option>
                <!--<option value="">Islas Wallis y Futuna</option>-->
                <option value="972">Israel</option>
                <option value="39">Italia</option>
                <option value="1876">Jamaica</option>
                <option value="81">Japón</option>
                <option value="962">Jordania</option>
                <option value="7">Kazajistán</option>
                <option value="254">Kenia</option>
                <!--<option value="">Kirguizistán</option>-->
                <option value="686">Kiribati</option>
                <option value="965">Kuwait</option>
                <!--<option value="">Laos</option>-->
                <option value="266">Lesotho</option>
                <option value="371">Letonia</option>
                <option value="961">Líbano</option>
                <option value="231">Liberia</option>
                <option value="218">Libia</option>
                <option value="41">Liechtenstein</option>
                <option value="370">Lituania</option>
                <option value="352">Luxemburgo</option>
                <option value="389">Macedonia, Ex-República Yugoslava de</option>
                <option value="261">Madagascar</option>
                <option value="60">Malasia</option>
                <option value="265">Malawi</option>
                <option value="960">Maldivas</option>
                <option value="223">Malí</option>
                <option value="356">Malta</option>
                <option value="212">Marruecos</option>
                <option value="596">Martinica</option>
                <option value="230">Mauricio</option>
                <option value="222">Mauritania</option>
                <option value="269">Mayotte</option>
                <option value="52">México</option>
                <!--<option value="">Micronesia</option>-->
                <option value="373">Moldavia</option>
                <option value="377">Mónaco</option>
                <option value="976">Mongolia</option>
                <option value="1664">Montserrat</option>
                <option value="258">Mozambique</option>
                <option value="264">Namibia</option>
                <option value="674">Nauru</option>
                <option value="977">Nepal</option>
                <option value="505">Nicaragua</option>
                <option value="227">Níger</option>
                <option value="234">Nigeria</option>
                <option value="683">Niue</option>
                <!--<option value="">Norfolk</option>-->
                <option value="47">Noruega</option>
                <option value="687">Nueva Caledonia</option>
                <option value="64">Nueva Zelanda</option>
                <option value="968">Omán</option>
                <option value="31">Países Bajos</option>
                <option value="507">Panamá</option>
                <option value="675">Papúa Nueva Guinea</option>
                <option value="92">Paquistán</option>
                <option value="595">Paraguay</option>
                <option value="51">Perú</option>
                <option value="872">Pitcairn</option>
                <option value="689">Polinesia Francesa</option>
                <option value="48">Polonia</option>
                <option value="351">Portugal</option>
                <option value="1">Puerto Rico</option>
                <option value="974">Qatar</option>
                <option value="44">Reino Unido</option>
                <option value="236">República Centroafricana</option>
                <!--<option value="">República Checa</option>-->
                <!--<option value="">República de Sudáfrica</option>-->
                <option value="1809">República Dominicana</option>
                <!--<option value="">República Eslovaca</option>-->
                <option value="262">Reunión</option>
                <option value="250">Ruanda</option>
                <option value="40">Rumania</option>
                <option value="7">Rusia</option>
                <option value="212">Sahara Occidental</option>
                <!--<option value="">Saint Kitts y Nevis</option>-->
                <option value="685">Samoa</option>
                <option value="684">Samoa Americana</option>
                <option value="378">San Marino</option>
                <option value="1784">San Vicente y Granadinas</option>
                <option value="290">Santa Helena</option>
                <option value="1758">Santa Lucía</option>
                <option value="239">Santo Tomé y Príncipe</option>
                <option value="221">Senegal</option>
                <option value="248">Seychelles</option>
                <option value="232">Sierra Leona</option>
                <option value="65">Singapur</option>
                <option value="963">Siria</option>
                <option value="252">Somalia</option>
                <option value="94">Sri Lanka</option>
                <!--<option value="">St Pierre y Miquelon</option>-->
                <option value="268">Suazilandia</option>
                <option value="249">Sudán</option>
                <option value="46">Suecia</option>
                <option value="41">Suiza</option>
                <option value="597">Surinam</option>
                <option value="66">Tailandia</option>
                <option value="886">Taiwán</option>
                <option value="255">Tanzania</option>
                <option value="991">Tayikistán</option>
                <!--<option value="">Territorios franceses del Sur</option>-->
                <!--<option value="">Timor Oriental</option>-->
                <option value="228">Togo</option>
                <option value="676">Tonga</option>
                <option value="1868">Trinidad y Tobago</option>
                <option value="216">Túnez</option>
                <option value="993">Turkmenistán</option>
                <option value="90">Turquía</option>
                <option value="688">Tuvalu</option>
                <option value="380">Ucrania</option>
                <option value="256">Uganda</option>
                <option value="598">Uruguay</option>
                <option value="998">Uzbekistán</option>
                <option value="678">Vanuatu</option>
                <option value="58">Venezuela</option>
                <option value="84">Vietnam</option>
                <option value="967">Yemen</option>
                <option value="381">Yugoslavia</option>
                <option value="260">Zambia</option>
                <option value="263">Zimbabue</option>
            <select><br>
            </div>
            <label>Telefono: *</label><br>
            <input type="text" name="txt_TELEFONO" class="texto" placeholder="Escriba su Número" required="true"><br>
            <label>Domicilio: *</label><br>
            <input type="text" name="txt_DOMICILIO" class="texto" placeholder="Escriba su Domicilio" required="true"><br>
            <button type="submit">GUARDAR</button>
        </div>
    </form>
</body>

</html><?php }
}
