<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>subir</title>
</head>

<body>
<p>&nbsp;</p>
<p>subir imagen XD</p>
<?php 
if((isset($_POST["enviado2"]))&&($_POST["enviado2"] == "form2"))
{
	$nombre_archivo = $_FILES['userfile']['name'];
	move_uploaded_file($_FILES['userfile']['tmp_name'],"../imagen/portadas/".$nombre_archivo);
	?>
    <script>
    opener.document.form2.strPortadas.value="	<?php echo $nombre_archivo; ?>";
	self.close();
    </script>
    <?php
}
else
{ ?>
<form action="gestionimagen_portada.php" method="post" enctype="multipart/form-data">
  <p>
  <input name="userfile" type="file" />
  </p>
  <p>
    
    <input name="subir imagen" type="submit" value="Subir Imagen"/>
    
    <input name="enviado2" type="hidden" value="form2"/>
  </p>

</form>
<?php } ?>
</body>
</html>