<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Pagina en blanco</title>
<style>
#cajita {
	/*border: 1px solid black;*/
	width: 350px;
	height: 300px;
}
</style>
</head>
<body>
	<h1>Formulario de envio correo electronico</h1>
	<div id="cajita">
		<form action="Enviar_mail.php" method="post">
			<table>
				<tr>
					<td>Nombre:*</td>
					<td><input type="text" name="nombre" required></td>
				</tr>
				<tr>
					<td>Apellido:*</td>
					<td><input type="text" name="apellido"></td>
				</tr>
				<tr>
					<td>Direccion de E-mail:*</td>
					<td><input type="text" name="direccion"></td>
				</tr>
				<tr>
					<td>Numero de telefono:</td>
					<td><input type="text" name="telefono"></td>
				</tr>
				<tr>
					<td>Asunto:</td>
					<td><input type="text" name="asunto"></td>
				</tr>
				<tr>
					<td>Comentarios:*</td>
					<td><textarea rows="3" name="comentarios"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center"><input type="submit"
						name="enviar" value="enviar"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>