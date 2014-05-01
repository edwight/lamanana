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

$maxRows_consulta_publi = 8;
$pageNum_consulta_publi = 0;
if (isset($_GET['pageNum_consulta_publi'])) {
  $pageNum_consulta_publi = $_GET['pageNum_consulta_publi'];
}
$startRow_consulta_publi = $pageNum_consulta_publi * $maxRows_consulta_publi;

mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_consulta_publi = "SELECT * FROM tblpublicidad ORDER BY tblpublicidad.fecha DESC";
$query_limit_consulta_publi = sprintf("%s LIMIT %d, %d", $query_consulta_publi, $startRow_consulta_publi, $maxRows_consulta_publi);
$consulta_publi = mysql_query($query_limit_consulta_publi, $mysql_noticias) or die(mysql_error());
$row_consulta_publi = mysql_fetch_assoc($consulta_publi);

if (isset($_GET['totalRows_consulta_publi'])) {
  $totalRows_consulta_publi = $_GET['totalRows_consulta_publi'];
} else {
  $all_consulta_publi = mysql_query($query_consulta_publi);
  $totalRows_consulta_publi = mysql_num_rows($all_consulta_publi);
}
$totalPages_consulta_publi = ceil($totalRows_consulta_publi/$maxRows_consulta_publi)-1;
?>
<div class="ads">
   
  <?php do { ?>
    <?php if($row_consulta_publi['strPosicion'] == "1"){ ?>
    <a href="."><img height="140px"width="140px" alt="Ads banner" src="imagen/publicidad/<?php echo $row_consulta_publi['strPublicidad']; ?>"/></a>
    <?php } ?>
    
    <?php if($row_consulta_publi['strPosicion'] == "2"){ ?>
    <a href="."><img height="280px"width="280px" alt="Ads banner" src="imagen/publicidad/<?php echo $row_consulta_publi['strPublicidad']; ?>"/></a>
    <?php } ?>
    
    <?php } while ($row_consulta_publi = mysql_fetch_assoc($consulta_publi)); ?>
</div>

	<?php
mysql_free_result($consulta_publi);
?>