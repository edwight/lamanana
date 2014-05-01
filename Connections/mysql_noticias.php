<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mysql_noticias = "localhost";
$database_mysql_noticias = "lamanana_noticias";
$username_mysql_noticias = "root";
$password_mysql_noticias = "";
$mysql_noticias = mysql_pconnect($hostname_mysql_noticias, $username_mysql_noticias, $password_mysql_noticias) or trigger_error(mysql_error(),E_USER_ERROR); 
?>