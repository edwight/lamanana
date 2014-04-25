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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_Recordset1 = "SELECT * FROM entradas ORDER BY entradas.fecha DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $mysql_noticias) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$maxRows_Consulta_uno = 2;
$pageNum_Consulta_uno = 0;
if (isset($_GET['pageNum_Consulta_uno'])) {
  $pageNum_Consulta_uno = $_GET['pageNum_Consulta_uno'];
}
$startRow_Consulta_uno = $pageNum_Consulta_uno * $maxRows_Consulta_uno;

mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_Consulta_uno = "SELECT * FROM entradas ORDER BY entradas.fecha DESC";
$query_limit_Consulta_uno = sprintf("%s LIMIT %d, %d", $query_Consulta_uno, $startRow_Consulta_uno, $maxRows_Consulta_uno);
$Consulta_uno = mysql_query($query_limit_Consulta_uno, $mysql_noticias) or die(mysql_error());
$row_Consulta_uno = mysql_fetch_assoc($Consulta_uno);

if (isset($_GET['totalRows_Consulta_uno'])) {
  $totalRows_Consulta_uno = $_GET['totalRows_Consulta_uno'];
} else {
  $all_Consulta_uno = mysql_query($query_Consulta_uno);
  $totalRows_Consulta_uno = mysql_num_rows($all_Consulta_uno);
}
$totalPages_Consulta_uno = ceil($totalRows_Consulta_uno/$maxRows_Consulta_uno)-1;

$maxRows_consulta_dos = 1;
$pageNum_consulta_dos = 0;
if (isset($_GET['pageNum_consulta_dos'])) {
  $pageNum_consulta_dos = $_GET['pageNum_consulta_dos'];
}
$startRow_consulta_dos = $pageNum_consulta_dos * $maxRows_consulta_dos;

mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_consulta_dos = "SELECT * FROM entradas ORDER BY entradas.fecha DESC";
$query_limit_consulta_dos = sprintf("%s LIMIT %d, %d", $query_consulta_dos, $startRow_consulta_dos, $maxRows_consulta_dos);
$consulta_dos = mysql_query($query_limit_consulta_dos, $mysql_noticias) or die(mysql_error());
$row_consulta_dos = mysql_fetch_assoc($consulta_dos);

if (isset($_GET['totalRows_consulta_dos'])) {
  $totalRows_consulta_dos = $_GET['totalRows_consulta_dos'];
} else {
  $all_consulta_dos = mysql_query($query_consulta_dos);
  $totalRows_consulta_dos = mysql_num_rows($all_consulta_dos);
}
$totalPages_consulta_dos = ceil($totalRows_consulta_dos/$maxRows_consulta_dos)-1;

$maxRows_consulta_tres = 9;
$pageNum_consulta_tres = 0;
if (isset($_GET['pageNum_consulta_tres'])) {
  $pageNum_consulta_tres = $_GET['pageNum_consulta_tres'];
}
$startRow_consulta_tres = $pageNum_consulta_tres * $maxRows_consulta_tres;

mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_consulta_tres = "SELECT * FROM entradas ORDER BY entradas.fecha DESC";
$query_limit_consulta_tres = sprintf("%s LIMIT %d, %d", $query_consulta_tres, $startRow_consulta_tres, $maxRows_consulta_tres);
$consulta_tres = mysql_query($query_limit_consulta_tres, $mysql_noticias) or die(mysql_error());
$row_consulta_tres = mysql_fetch_assoc($consulta_tres);

if (isset($_GET['totalRows_consulta_tres'])) {
  $totalRows_consulta_tres = $_GET['totalRows_consulta_tres'];
} else {
  $all_consulta_tres = mysql_query($query_consulta_tres);
  $totalRows_consulta_tres = mysql_num_rows($all_consulta_tres);
}
$totalPages_consulta_tres = ceil($totalRows_consulta_tres/$maxRows_consulta_tres)-1;

$queryString_consulta_tres = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_consulta_tres") == false && 
        stristr($param, "totalRows_consulta_tres") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_consulta_tres = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_consulta_tres = sprintf("&totalRows_consulta_tres=%d%s", $totalRows_consulta_tres, $queryString_consulta_tres);
?>

<div id="content" role="main">	
		<section>
			<div class="section_content"> <div class="post-holder">
			  
              
               <?php do { ?>
               <?php 
   if($row_Consulta_uno['strPosicion'] == "1"){ ?>
                 
                 
               <div class="homepost small-image-right">
                 <!-- -----------------------------------uno -------------------------------- -->
                 <div class="principal-sub">
                   <p><?php echo $row_Consulta_uno['strSubtitulo']; ?></p>
                 </div>
                   
                 <div class="title-meta-holder">
                   <div class="homepost-heading"> <h2><a href="detallados.php?recordID=<?php echo $row_Consulta_uno['idEntradas']; ?>"><?php echo $row_Consulta_uno['strTitulo']; ?></a></h2> 
                   </div>
                   <div class="meta_author-area">
                       
                     <div class="metainfoleft">
                       <div class="home-category"><ul class="post-categories">
                         <li><a href="categorias.php?recordID=<?php echo $row_Consulta_uno['strCategorias']; ?>" title="<?php echo $row_Consulta_uno['strCategorias']; ?>"><?php echo $row_Consulta_uno['strCategorias']; ?></a></li>
                       </ul></div>
                       <div class="info">
                       publicado el <?php echo $row_Consulta_uno['fecha']; ?></div>
                       <div class="cb"></div>
                     </div>
                       
                    
                       
                     <div class="cb"></div>
                       
                   </div>
                 </div>
                   
                 <div class="principal-leyenda">
                     <blockquote>
                       <p><?php echo $row_Consulta_uno['strLeyenda']; ?></p>
                   </blockquote>
                 </div><!-- end portada2 leyenda -- -->
                   
                 <div class="principal-contenido">
                     <p><?php echo substr( $row_Consulta_uno['strContenido'],0,500); ?></p>
                     
                     
                     
                     
                 </div> 
                   
                   
                   
               </div>
               <?php } ?>
               <!-- ------------ end uno ----------------- -->
                 <?php } while ($row_Consulta_uno = mysql_fetch_assoc($Consulta_uno)); ?>
<!-- ----------------dos	------------ -->	  
              

 
    
     
        <?php do { ?>
        <?php 
   if($row_consulta_dos['strPosicion'] == "2"){ ?>
          
          
          
        <div class="homepost big-image-center">
            
          <div class="postarea">
            <div class="content-image"><a href="detallados.php?recordID=<?php echo $row_consulta_dos['idEntradas']; ?>" rel="bookmark"> <img width="680" height="413" src="imagen/noticias/<?php echo $row_consulta_dos['strImagen']; ?>" class="attachment-big-image-center wp-post-image" alt="{{entradas.titulo}}" title="{{entradas.titulo}}"></a></div>
            <div class="segundo-titulo"> <p style="margin-bottom:3px;"><a href="detallados.php?recordID=<?php echo $row_consulta_dos['idEntradas']; ?>"><?php echo $row_consulta_dos['strTitulo']; ?></a></p>
              </div>
            <div class="content-area" style=" text-align:justify;"><p><?php echo $row_consulta_dos['strContenido']; ?></p> 
              </div>
            <div class="cb"></div>
            </div>
            
            
            
            
          <div class="tags-readmore-holder">
            <div class="tags">
                
              <!-- --------------------------------------------- widget facebook ------------------------------------------- -->
              <div class="fb-like" data-href="https://www.facebook.com/diario.lamanana" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
              <!-- --------------------------------------------- end widget facebook ------------------------------------------- -->
              </div>
            <div class="readmore">
                
                
              <a href="detallados.php?recordID=<?php echo $row_consulta_dos['idEntradas']; ?>" rel="bookmark"> Continue Leyendo </a></div>
            <div class="cb"></div>
            </div>
        </div>
          
        <?php } ?>
          <?php } while ($row_consulta_dos = mysql_fetch_assoc($consulta_dos)); ?>
<!-- -------------end dos ----------- -->
			 
			
			  <div class="noticias">Noticias</div>	

	<div id="wrapper">
    <div id="list">
<!-- --------------- tres --------------- -->

     <?php do { ?>
     
      <?php 
   if($row_consulta_tres['strPosicion'] >"0") { ?>
     
       <!-- si hay imagen -->
       <?php if(isset($row_consulta_tres['strImagen'])){ ?>
       
         <div class="item"> 
     
         <div class="imgholder">
            <a href="detallados.php?recordID=<?php echo $row_consulta_tres['idEntradas']; ?>"><img width="180" height="180" src="imagen/noticias/<?php echo $row_consulta_tres['strImagen']; ?>"></a>
           </div>
         
         <strong>
           <a href="detallados.php?recordID=<?php echo $row_consulta_tres['idEntradas']; ?>" rel="bookmark"> <?php echo $row_consulta_tres['strTitulo']; ?></a>
           </strong>
         <div class="masoni_parrafo" style=" text-align:justify; padding-letf:5px; padding-right:5px;">
           
           <?php echo substr( $row_consulta_tres['strContenido'],0,150).' ...'; ?>
           </div>
         
         <div class="meta"><a href="detallados.php?recordID=<?php echo $row_consulta_tres['idEntradas']; ?>">Continue Leyendo</a><div class="categoria"><a href="categorias.php?recordID=<?php echo $row_consulta_tres['strCategorias']; ?>" title="<?php echo $row_consulta_tres['strTitulo']; ?>">#<?php echo $row_consulta_tres['strCategorias']; ?></a> 
           </div></div>
         
       </div> <!-- end item -->
       
       <?php }
       else
       { ?>
       <!-- si no hay imagen -->
 
         <div class="item"> 
         
         <strong>
           <a href="detallados.php?recordID=<?php echo $row_consulta_tres['idEntradas']; ?>" rel="bookmark"> <?php echo $row_consulta_tres['strTitulo']; ?></a>
           </strong>
         <div class="masoni_parrafo" style=" text-align:justify; padding-letf:5px; padding-right:5px;">
           
           <?php echo substr( $row_consulta_tres['strContenido'],0,150).' ...'; ?>
           </div>
         
         <div class="meta"><a href="detallados.php?recordID=<?php echo $row_consulta_tres['idEntradas']; ?>">Continue Leyendo</a><div class="categoria"><a href="categorias.php?recordID=<?php echo $row_consulta_tres['strCategorias']; ?>" title="<?php echo $row_consulta_tres['strTitulo']; ?>">#<?php echo $row_consulta_tres['strCategorias']; ?></a> 
           </div></div>
         
       </div> <!-- end item -->
       
       <?php } ?>
        <!-- si no hay imagen -->
       <?php } ?>
       <?php } while ($row_consulta_tres = mysql_fetch_assoc($consulta_tres)); ?>
<!-- --------- end tres ------------- -->    
   
   </div>
</div>
		

<br><br><br>
<table border="0">
  <tr>
    <td><?php if ($pageNum_consulta_tres > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_consulta_tres=%d%s", $currentPage, 0, $queryString_consulta_tres); ?>">Primero</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_consulta_tres > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_consulta_tres=%d%s", $currentPage, max(0, $pageNum_consulta_tres - 1), $queryString_consulta_tres); ?>">Anterior</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_consulta_tres < $totalPages_consulta_tres) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_consulta_tres=%d%s", $currentPage, min($totalPages_consulta_tres, $pageNum_consulta_tres + 1), $queryString_consulta_tres); ?>">Siguiente</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_consulta_tres < $totalPages_consulta_tres) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_consulta_tres=%d%s", $currentPage, $totalPages_consulta_tres, $queryString_consulta_tres); ?>">&Uacute;ltimo</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<!-- --------------------------------------  end modulo principal -------------------------------------------------- -->

	</div><!-- .section-content -->
		</section>
	</div><!-- #content -->
    
    
    
    

<?php


mysql_free_result($Consulta_uno);

mysql_free_result($consulta_dos);

mysql_free_result($consulta_tres);
?>