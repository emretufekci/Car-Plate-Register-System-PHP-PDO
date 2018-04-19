
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<?php
include ("../db/database.php");
// query about delete functionality
  $table="car_info";
  $query=sprintf("DELETE FROM %s WHERE id=%s",$table,$_GET['id']);
  $result = mysql_query($query);
// query about delete functionality

  if($result){
    //if result true
      echo "<script>
           $( document ).ready(function() {
                     swal(\"Good job!\", \"Your information deleted.\", \"success\");
                   });
         </script>";
         header("Refresh:2;url=admin.php");
  }else{
    //if result false
        echo "<script>
           $( document ).ready(function() {
                     swal(\"Warning!\", \"Sorry, something goes wrong.\", \"error\");
                   });
         </script>";
         header("Refresh:2;url=admin.php");
  }

?>
