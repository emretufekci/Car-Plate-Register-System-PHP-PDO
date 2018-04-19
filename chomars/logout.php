<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<?php
ob_start();
session_start();
session_destroy();
echo "<script>
$( document ).ready(function() {
          swal(\"Goodbye!\", \"See you ".$_SESSION["user"]."\", \"info\");
        });
      </script>";
ob_end_flush();
?>

<script>

setTimeout(function()
{ 
     window.location = "index.php"; 
}, 1000);

</script>