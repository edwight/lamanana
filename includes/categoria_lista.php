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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_cunsulta_categorias = 15;
$pageNum_cunsulta_categorias = 0;
if (isset($_GET['pageNum_cunsulta_categorias'])) {
  $pageNum_cunsulta_categorias = $_GET['pageNum_cunsulta_categorias'];
}
$startRow_cunsulta_categorias = $pageNum_cunsulta_categorias * $maxRows_cunsulta_categorias;

$varcategorias_cunsulta_categorias = "Coro";
if (isset($_GET["recordID"])) {
  $varcategorias_cunsulta_categorias = $_GET["recordID"];
}
mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_cunsulta_categorias = sprintf("SELECT * FROM entradas WHERE entradas.strCategorias = %s ORDER BY entradas.fecha DESC", GetSQLValueString($varcategorias_cunsulta_categorias, "text"));
$query_limit_cunsulta_categorias = sprintf("%s LIMIT %d, %d", $query_cunsulta_categorias, $startRow_cunsulta_categorias, $maxRows_cunsulta_categorias);
$cunsulta_categorias = mysql_query($query_limit_cunsulta_categorias, $mysql_noticias) or die(mysql_error());
$row_cunsulta_categorias = mysql_fetch_assoc($cunsulta_categorias);

if (isset($_GET['totalRows_cunsulta_categorias'])) {
  $totalRows_cunsulta_categorias = $_GET['totalRows_cunsulta_categorias'];
} else {
  $all_cunsulta_categorias = mysql_query($query_cunsulta_categorias);
  $totalRows_cunsulta_categorias = mysql_num_rows($all_cunsulta_categorias);
}
$totalPages_cunsulta_categorias = ceil($totalRows_cunsulta_categorias/$maxRows_cunsulta_categorias)-1;

$queryString_cunsulta_categorias = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_cunsulta_categorias") == false && 
        stristr($param, "totalRows_cunsulta_categorias") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_cunsulta_categorias = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_cunsulta_categorias = sprintf("&totalRows_cunsulta_categorias=%d%s", $totalRows_cunsulta_categorias, $queryString_cunsulta_categorias);
?>
<?php do { ?>
  <div class="homepost normal-post">
    
    <div class="title-meta-holder">
      <div class="homepost-heading"> <h2><a href="detallados.php?recordID=<?php echo $row_cunsulta_categorias['idEntradas']; ?>" rel="bookmark"><?php echo $row_cunsulta_categorias['strTitulo']; ?></a></h2> </div>
      <div class="meta_author-area">
        
        <div class="metainfoleft">
          <div class="home-category"><ul class="post-categories">
          <li><a href="categorias.php?recordID=<?php echo $row_cunsulta_categorias['strCategorias']; ?>" title="<?php echo $row_cunsulta_categorias['strCategorias']; ?>"><?php echo $row_cunsulta_categorias['strCategorias']; ?></a></li></ul></div>
          <div class="info">
            Publicado el <?php echo $row_cunsulta_categorias['fecha']; ?></div>
          <div class="cb"></div>
        </div>
        
        <div class="meta-info-right">
          
          
          
          
        </div>
        
  <div class="cb"></div>
        
  </div>
      </div>
    <div class="postarea">
      
      <div class="content-image"><a href="detallados.php?recordID=<?php echo $row_cunsulta_categorias['idEntradas']; ?>" rel="bookmark"> <img width="210" height="158" src="imagen/noticias/<?php echo $row_cunsulta_categorias['strImagen']; ?>" class="attachment-smallthumb-left wp-post-image" alt="." title="<?php echo $row_cunsulta_categorias['strTitulo']; ?>"></a></div>
      
      <div class="content-area" style=" text-align : justify;"> 
  <p> <?php echo substr($row_cunsulta_categorias['strContenido'],0,500);?><a href="."></a></p> </div>
      <div class="cb"></div>
      
      </div>
    
    
    <div class="tags-readmore-holder">
      <div class="tags">
  <!-- --------------------------------------------- widget facebook ------------------------------------------- -->
  <div class="fb-like" data-href="https://www.facebook.com/diario.lamanana.3" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

  <!-- --------------------------------------------- end widget facebook ------------------------------------------- -->
        </div>
      <div class="readmore">
        
        <a href="detallados.php?recordID=<?php echo $row_cunsulta_categorias['idEntradas']; ?>" rel="."> Continue Leyendo </a></div>
      <div class="cb"></div>
      </div>
  </div>
  <?php } while ($row_cunsulta_categorias = mysql_fetch_assoc($cunsulta_categorias)); ?>
<p>
  <?php
mysql_free_result($cunsulta_categorias);
?>
</p>


<ul class="pager">
<table border="0">
  <tr>
   
    <td><?php if ($pageNum_cunsulta_categorias > 0) { // Show if not first page ?>
        <li><a href="<?php printf("%s?pageNum_cunsulta_categorias=%d%s", $currentPage, max(0, $pageNum_cunsulta_categorias - 1), $queryString_cunsulta_categorias); ?>">Anterior</a></li>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_cunsulta_categorias < $totalPages_cunsulta_categorias) { // Show if not last page ?>
        <li><a href="<?php printf("%s?pageNum_cunsulta_categorias=%d%s", $currentPage, min($totalPages_cunsulta_categorias, $pageNum_cunsulta_categorias + 1), $queryString_cunsulta_categorias); ?>">Siguiente</a></li>
        <?php } // Show if not last page ?></td>
 
  </tr>
</table>
</ul>
