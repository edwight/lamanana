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
if((isset($_POST["enviado3"]))&&($_POST["enviado3"] == "form3"))
{
	$nombre_archivo = $_FILES['userfile']['name'];
	move_uploaded_file($_FILES['userfile']['tmp_name'],"../imagen/publicidad/".$nombre_archivo);
	?>
    <script>
    opener.document.form3.strPublicidad.value="	<?php echo $nombre_archivo; ?>";
	self.close();
    </script>
    <?php
}
else
{ ?>
<form action="gestionimagen_publicidad.php" method="post" enctype="multipart/form-data">
  <p>
  <input name="userfile" type="file" />
  </p>
  <p>
    
    <input name="subir imagen" type="submit" value="Subir Imagen"/>
    
    <input name="enviado3" type="hidden" value="form3"/>
  </p>

</form>
<?php } ?>
</body>
</html>