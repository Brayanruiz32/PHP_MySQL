<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>

h1{
	text-align:center;
	color:#00F;
	border-bottom:dotted #0000FF;
	width:50%;
	margin:auto;
	
	
}

table{
	border:1px solid #F00;
	padding:20px 50px;
	margin-top:50px;
}

body{
	background-color:#FFC;
}


</style>
</head>

<body>
<h1>Registro de Artículos</h1>
<form name="form1" method="get" action="Logica_Insertar_DatosPDO.php">
  <table border="0" align="center">
    <tr>
      <td>Nombre</td>
      <td><label for="nombre"></label>
      <input type="text" name="nombre" id="c_art"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="apellido"></label>
      <input type="text" name="apellido" id="seccion"></td>
    </tr>
    <tr>
      <td>Telefono</td>
      <td><label for="telf"></label>
      <input type="text" name="telf" id="n_art"></td>
    </tr>
    <tr>
      <td>Direccion</td>
      <td><label for="direc"></label>
      <input type="text" name="direc" id="precio"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="pswrd"></label>
      <input type="text" name="pswrd" id="fecha"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="enviar" id="enviar" value="Actualizar Registro"></td>
      <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
    </tr>
  </table>
</form>
</body>
</html>