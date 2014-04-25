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

$varnoticiasdetalles_Noticias_Detalles = "0";
if (isset($_GET["recordID"])) {
  $varnoticiasdetalles_Noticias_Detalles = $_GET["recordID"];
}
mysql_select_db($database_mysql_noticias, $mysql_noticias);
$query_Noticias_Detalles = sprintf("SELECT * FROM entradas WHERE entradas.idEntradas = %s", GetSQLValueString($varnoticiasdetalles_Noticias_Detalles, "int"));
$Noticias_Detalles = mysql_query($query_Noticias_Detalles, $mysql_noticias) or die(mysql_error());
$row_Noticias_Detalles = mysql_fetch_assoc($Noticias_Detalles);
$totalRows_Noticias_Detalles = mysql_num_rows($Noticias_Detalles);
?>
<!DOCTYPE html>

<html dir="ltr" lang="es-ES">

<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<script type="text/javascript" src="js/index/auth016.js"></script>
<link rel="stylesheet" type="text/css" href="css/detalles/widget118.css" media="all">

<link rel="shortcut icon" href="img/favicon.ico">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<link rel="stylesheet" type="text/css" href="css/index/widget2.css" media="all">

 <link rel="stylesheet" id="style-css" href="css/clasificado/masory_style.css" type="text/css" media="all">


<title>DETALLES</title>



 

 <!--[if lt IE 9]>

<![endif]-->
<!-- OpenGraph Facebook Start --> 
<!-- OpenGraph Facebook Ends -->

 	<!-- Google Fonts -->	 
 	<!-- Google Fonts -->	 	<!-- Google Fonts -->	 	<!-- Google Fonts -->	 	<!-- Google Fonts -->	 	<!-- Google Fonts -->	 	<!-- Google Fonts -->	 
 	<!-- Google Fonts -->	 


 <style>
.single-wrapper .entry-content p, .single-wrapper .entry-content  {font-size: 15px !important; }
 .entry-content h1 {font-family: Arial,Helvetica,sans-serif ;font-size: 25px !important; color:  #000 ;}
 .entry-content h2 {font-family:  Arial,Helvetica,sans-serif ;font-size: 24px !important; color:  #000 ;}
 .entry-content h3 {font-family:  Arial,Helvetica,sans-serif ;font-size: 24px !important; color:  #000 ;}
 .entry-content h4 {font-family:  Arial,Helvetica,sans-serif ;font-size: 21px !important; color:  #000 ;}
 .entry-content h5 {font-family:  Arial,Helvetica,sans-serif ;font-size: 16px !important; color:  #000 ;}
 .entry-content h6 {font-family:  Arial,Helvetica,sans-serif ;font-size: 14px !important; color:  #000 ;}

 
  

.entry-content a {
 color: #236CBF !important;
text-decoration : none;
}
.entry-content a:hover	{
 color:#236CBF !important;
text-decoration : none;
}</style>
 


<link rel="stylesheet" id="style-css" href="css/detalles/style.css" type="text/css" media="all">
<script type="text/javascript" async src="js/index/ga.js"></script>
<link rel="stylesheet" id="style-css" href="css/clasificado/masory_style.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="css/detalles/jsCarousel.css" />

<script type="text/javascript" src="js/detalles/jquery.js"></script>
<script type="text/javascript" src="js/detalles/camera.min.js"></script>
<script type="text/javascript" src="js/detalles/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/detalles/js.js"></script>
<script type="text/javascript" src="js/detalles/ddsmoothmenu1.js"></script>



	<!--jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/index/responsive.css" type="text/css" media="screen">
<script type="text/javascript">	
jQuery(document).ready(function($) { 
$('#camera_wrap_1').camera({ 
height: '226px',
loader: 'pie',
pagination: true,
thumbnails: true 
}); 
});
</script>




<script src="/media/js/jquery-latest.js" type="text/javascript"></script>

<script type="text/javascript" src="js/detalles/jsCarousel.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#jsCarousel').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: true });
        });
    </script>


</head>
<body class="home blog">

<!-- --------------------------facebook ------------------------------- -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="top1"><a name="top"></a></div>

<!-- -----------------------------end facebook ----------------------------- -->



 
<div class="header-wrapper">	
		<!-- trending -->
		<div class="trending-wrapper">
			<div class="trending-holder">
			
					<div class="home-navigate">
						<div class="navigate-text">Navegar<span class="navigate-arrow"></span></div>	
						<div class="navigate-dropdown"><div class="navigate-menu"><ul id="menu-top-menu" class="menu"><li id="menu-item-575" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-575"><a href="/">Inicio</a></li>

<li id="menu-item-576" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-576" class="lnchPopop" >
	<a href=".">Conctato</a></li>





<li id="menu-item-576" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-576"><a href=".">Iniciar Sesión</a></li>


</ul></div> </div>	
					</div>
				<div class="cb"></div>	
			</div>
		</div>	
		<!-- end trending -->
	<!-- header -->


	<header id="masthead" class="site-header" role="banner">	
		<div id="header">
	 
			<div class="head-wrapper">				
				<div class="logo-holder">
				
				</div>	
					
				

		
					</div>				
						 

 
				</div>
			<div class="cb"></div>

					 
					<div class="ad-2">
				<?php include("includes/portadas.php"); ?>  		
					</div>
					 


			</div>	
		<!--</div> -->	

		<!-- menu -->
		<?php include("includes/Menu_Principal.php"); ?>
<!-- #navigation-wrapper -->
		<!-- end menu -->	
	</header> 
	<!-- end header -->
</div>

<div id="main">
 
 <div id="content-wrapper" class="site-content">

      

<div id="content" role="main" class="single-wrapper">
  
<header class="entry-header-single">
			

			
<div class="principal-sub">
    <p><?php echo $row_Noticias_Detalles['strSubtitulo']; ?></p>
    </div>
 
<h1 class="entry-title single-entry-title"><?php echo $row_Noticias_Detalles['strTitulo']; ?></h1> 

 
 
<div class="single-meta">
  <div class="metainfoleft"> 
    <div class="info">
      publicado el <?php echo $row_Noticias_Detalles['fecha']; ?></div> 
   <div class ="info">
      <div class="fb-like" data-href="https://www.facebook.com/diario.lamanana.3" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>   
   </div>
  </div>
  
  <div class="single-pagi"> 
    <div class="prev-nav"> <a href="http://www.lamanana.com.ve/">« ANTERIOR </a></div> | 
    <div class="next-nav"> </div> 
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div>
</header><!-- .entry-header -->


<!-- contenido -->
<div class="entry-content">
<!-- si hay imagen -->
<?php if(isset($row_Noticias_Detalles['strImagen'])){ ?>


    <p><img class="alignnone  wp-image-413" title="<?php echo $row_Noticias_Detalles['strTitulo']; ?>" src='imagen/noticias/<?php echo $row_Noticias_Detalles['strImagen']; ?>' alt="" width="680" height="319"></p>

    <div class="principal-leyenda">
                  <blockquote>
                      <p><?php echo $row_Noticias_Detalles['strLeyenda']; ?></p>
                  </blockquote>
        </div><!-- end portada2 leyenda -- -->

     <div class="principal-contenido" style="text-align:justify;">
              <p><?php echo nl2br($row_Noticias_Detalles['strContenido']); ?></a></p>
             

        </div> <!-- end portada2-contenido -->

<?php }
	else 
	{ ?>
	


    <div class="principal-leyenda">
                  <blockquote>
                      <p><?php echo $row_Noticias_Detalles['StrLeyenda']; ?></p>
                  </blockquote>
        </div><!-- end portada2 leyenda -- -->

     <div class="principal-contenido" style="text-align:justify;">
              <p><?php echo nl2br($row_Noticias_Detalles['strContenido']); ?></a></p>
             

        </div> <!-- end portada2-contenido -->
	
	
<?php } ?>


   


 
      </div><!-- .entry-content -->

<div class="cb"></div> 

<!-- 
	</div><!-- .section-content -->

<!-- ----------------------------------------Disqus ------------------------------------- -->
  <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'lamananacom'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    

<!-- ----------------------------------------end Disqus ------------------------------------- -->
	</div><!-- #content -->


<!------------------------------------------------------ #contenido aside ------------------------------------------- -->
<div id="sidebar">
<div class="sidebar-wrapper">
 



 <!------------------------------------------------------ #contenido social ------------------------------------------- -->
<?php include("includes/contenido_social.php");?>
 <!------------------------------------------------------ #end contenido social ------------------------------------------- -->

 <!-- --------------------------------------------contenedor twitter -------------------------------------------->
<?php include("includes/twitter.php");?>

 <!-- -------------------------------------------- end contenedor twitter -------------------------------------------->

<!-- ----------------------------------------------- chica hot ------------------------------------  -->

<?php include("includes/Chica_hot.php");?>
<!-- ----------------------------------------------- end chica hot ------------------------------------  -->

<!-- ----------------------------------------------- publicidad ------------------------------------  -->
<br>
<?php include("includes/publicidad.php");?>

<br>
	
	 
<!-- ----------------------------------------------- end publicidad  ------------------------------------  -->

		



  <!-- -------------------------------------------- aside contenido facebook ------------------------------------------------ -->
 


	








<!--begin of social widget--> 

<!--end of social widget--> 
		
		
 
</div>
</div>	
<div class="cb"></div>

	
	</div>

		</div><!-- #content-wrapper .site-content -->
	</div><!-- #main -->


 <!-- ------------------------------------------------ footer ------------------------------------------------------ -->
<div id="footer">


<div class="cb"></div>

	<div class="footer-menu">
			<div id="fnav"> 
				<div id="fotnav" class="ddsmoothmenu1"><ul id="menu-main-menu-1" class="menu"><li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-405"><a href=".">INICIO</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-406"><a href=".">Regionales</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category arrow menu-item-386 parent"><a href=".">Nacionales</a>

</li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category arrow menu-item-390 parent"><a href=".">Internacionales</a>

</li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-394"><a href=".">Sucesos</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-384"><a href=".">Deportes</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-395"><a href=".">Tecnologias</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-397"><a href=".">Farandula</a></li>
<li class="menu-item menu-item-type-taxonomy menu-item-object-category arrow menu-item-399 parent"><a href=".">Salud</a></li>

			</div> 	

<!-- footer2-wrapper -->
<br>

<div class="footer2-wrapper">
<div class="footer2-area">
    <div id="footerwrapper1"> 
 
		
		
		<div class="box-hold footerwrapper">                      
			<div class="box footer1">                   
				   
    <div class="widget-container widget browsebycat"> 
	<div class="widget-title">
	<h3>
	<span>Busqueda Por Categorias</span>
	</h3>
	</div>
	<div class="sectioncont">
		<ul class="pane">	
			
</ul>
	</div>
	</div>       <div class="cb"></div>       
			</div>
			<div class="box footer2">

				 <div class="widget">

				 	<h3></h3>   
				 	<div class="block-item-small-view popularviewbg">
<ol>

	
</ol>
</div>  
     
 </div>          

  <div class="cb"></div> 
			</div>
			<div class="box footer3">
				<div class="widget" class="color_blanco"><h3>Contactanos</h3>
	<div class="menu-top-menu-container">
						

	
				<p class="color_blanco">Coro : Calle Zamora 64-1</p>
						<p class="color_blanco">Telf: +58-02682518667</p>
						<p class="color_blanco">Punto Fijo : Calle Libertad esquina AV. Mexico</p>
						<p class="color_blanco">Telf: +58-0692468516</p>
					</div>
					</div>
			</div>                  
			
			<div class="box footer4"></div>                    
				







		</div>
				
				
    </div>

</div>
</div><!-- footer2-wrapper -->


<div class="footer3-wrapper">
<div class="footer3-area">


	
					<div id="bottomfooter">
						<div class="site-footer">
						La mañana ©  - todos los derechos reservados 
 | <a href=".">  </a>  
						</div>	<!-- .site-footer .site-footer -->

						<div class="cb"> </div> 	 	 

</div><!-- #bottomfooter -->
</div>
</div><!-- footer3-wrapper -->

  


</div><!-- #footer -->
<!-- ------------------------------------------------end footer --------------------------------------- -->
  


<?php include_once("includes/analyticstracking.php") ?>

</body></html>
<?php
mysql_free_result($Noticias_Detalles);
?>