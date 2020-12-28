<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
tr, td, table {
	border: 1px solid black;
}
</style>
</head>
<body>
	<!--  <div id="cajita" style="border: 1px dashed black;">-->
		<form action="Insertar_contenido.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Titulo:</td>
					<td><input type="text" name="titulo"></td>
				</tr>
				<tr>
					<td>Comentarios:</td>
				<td><textarea rows="4" name="comentario"></textarea></td>
			</tr>
				<tr>
					<td colspan="2">Seleccione una imagen con tama&ntilde;o inferior a 2MB</td>
				</tr>
				<tr>
					<td colspan="2"><input type="file" name="imagen"></td>
					<input type="file" name="MAX-FILE-SIZE" value="2000000" hidden> 
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;"><input type="submit" value="Enviar" name="enviar"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;"><a href="Leer_contenido.php">Pagina de visualizacion del blog</a></td>
				</tr>
			</table>
		</form>
	<!-- </div>-->
</body>
</html>