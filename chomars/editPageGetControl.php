<?php
include ("../db/database.php");
@session_start();
  if(@isset($_GET['id'])){

    $table='car_info';
    @$_SESSION['controlID']=$_GET['id'];

    $queryRow=sprintf("SELECT * FROM $table WHERE id='%s'",$_SESSION['controlID']);
    $mysql_query_apply=@mysql_query($queryRow);

    //check if does not have any record
    $count_row = @mysql_num_rows($mysql_query_apply);

    // get the value from queryRow with id
    $row=@mysql_fetch_array($mysql_query_apply);

  }else{
    // turn back if does not have get it
    //turn back after updated -- turn editPage
    @header("Refresh:1;url=editPage.php?id=".$_SESSION['controlID']."");
  }



?>
