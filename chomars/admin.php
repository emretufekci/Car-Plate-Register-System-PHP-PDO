<!DOCTYPE html>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<?php
include "../db/config.php";
include "../db/database.php";

// sayfaya erişim yapan kişinin admin yetkisini kontrol ediyoruz
if($_SESSION["admin"]==false)
{
  echo "<script>
  $( document ).ready(function() {
            swal(\"Welcome!\", \"Sorry, you are not admin.\", \"error\");
          });
        </script>";

        echo "<script>
          function waitPage(){
            window.location='index.php';
          }
        </script>";

        echo "<script>
          setTimeout('waitPage()',0000);
        </script>";
}


?>

<!--
THIS PROJECT HANDLED ON BY
-EMRE TUFEKCI ===> All Bootsrap Functionality and HTML&HTML Comments
-ERCAN HAVARE
-SAMED BICER
-->
<html>
<head>
    <title>Car Plate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../fa/webfont/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <style>
        body {
            background-color: #ccccb3;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }
        .container {
          margin-top: 5%;
        }
        h1{
          margin-top: 5%;
        }
        @media (max-width: 480px) {
        }
        @media (max-width: 720px) {
        }
        @media (max-width: 1024px) {
        }
        #plate{
        	    letter-spacing: 2px;
        }
    </style>



</head>

<body>

  <h1 class="display-4 text-center border border-light bg-light ">Car Plate Management System</h1>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
  <div class="table-responsive-sm">
  <table id="example" class="table table-striped table-bordered table-hover bg-light" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th>Car Model</th>
                  <th>Car Plate</th>
                  <th>Full Name Of Driver</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody class="text-center">

              <tr class="text-center">
                  <td>Range Rover</td>
                  <td id="plate" class="text-white bg-secondary border">34ABZ42</td>
                  <td>ERCAN HAVARE</td>
                  <td><button id="edt1" onclick="return editFunc();" type="submit" class="btn btn-primary" value="edit">Edit</button> </td>
                  <td><button onclick="return deleteFunc();" type="submit" class="btn btn-danger" value="delete">Delete</button></td>
              </tr>
              <tr>
                  <td>IMPALA</td>
                  <td id="plate" class="text-white bg-secondary">AB443</td>
                  <td>SAMED BICER</td>
                  <td><button onclick="return editFunc();" type="submit" class="btn btn-primary" value="edit">Edit</button> </td>
                  <td><button onclick="return deleteFunc();" type="submit" class="btn btn-danger" value="delete">Delete</button></td>
              </tr>
              <tr>
                  <td>MUSTANG 2.3L</td>
                  <td id="plate" class="text-white bg-secondary">34XXX34</td>
                  <td>EMRE TUFEKCI</td>
                  <td><button onclick="return editFunc();" type="submit" class="btn btn-primary" value="edit">Edit</button> </td>
                  <td><button onclick="return deleteFunc();" type="submit" class="btn btn-danger" value="delete">Delete</button></td>
              </tr>

          </tfoot>
      </table>
</div>


</div>
</div>
</div>
</body>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script src="../js/sweetalert.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable( {
      responsive: true
  } );
} );
</script>

<script>
function editFunc() {
var x = confirm("Are you sure? You will edit the record");
if (x==true)
  return true;
else
return false;
}
</script>

<script>
function deleteFunc() {
var x = confirm("Are you sure? You will delete the record");
if (x==true)
  return true;
else
return false;
}
</script>
</html>
