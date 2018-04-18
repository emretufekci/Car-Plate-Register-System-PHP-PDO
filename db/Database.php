<?php
/**
 * Created by PhpStorm.
 * User: Ercan Havare
 * Date: 3/22/2018
 * Time: 6:28 PM
 */
include "config.php";

    $host = DB_HOST;
    $user = DB_USER;
    $password = DB_PASS;
    $dbName = DB_NAME;

    //db bağlantısı
  $host_connect=@mysql_connect($host,$user,$password);
  	if(!$host_connect) die("Error:Something goes wrong about host".mysql_error());

  $db_connect=@mysql_select_db($dbName,$host_connect);
  	if(!$db_connect) die("Error:Something goes wrong about database".mysql_error());


?>
