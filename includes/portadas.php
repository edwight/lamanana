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
$query_consulta_hot = "SELECT * FROM tblportadas ORDER BY tblportadas.fecha DESC";
$consulta_hot = mysql_query($query_consulta_hot, $mysql_noticias) or die(mysql_error());
$row_consulta_hot = mysql_fetch_assoc($consulta_hot);
$totalRows_consulta_hot = mysql_num_rows($consulta_hot);

mysql_free_result($consulta_hot);


?>

<img src="imagen/portadas/<?php echo $row_consulta_hot['strPortadas']; ?>" style="width: 999px;">