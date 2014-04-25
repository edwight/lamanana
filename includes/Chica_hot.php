<?php require_once('Connections/mysql_noticias.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_Recordset1 = "SELECT * FROM tblchica_hot ORDER BY tblchica_hot.fecha DESC";
$Recordset1 = mysql_query($query_Recordset1, $mysql_noticias) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<div class="adspace-widget widget">
	<div class="sombra">
	<a href="../chica_hot_detalles.php?recordID=<?php echo $row_Recordset1['idChicahot']; ?>"> <img width="300" height="300" src="imagen/chica_hot/<?php echo $row_Recordset1['strImagen_hot']; ?>" title="chica" alt=""></a>
	</div>
	<?php
mysql_free_result($Recordset1);
?>
