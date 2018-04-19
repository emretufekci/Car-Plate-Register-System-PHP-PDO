<!DOCTYPE html>
<?php

include ("../db/database.php");

// control user who is access
session_start();
if(@$_SESSION["admin"]==false)
{
  // direction page of index.php
  header("Refresh: 1; url= index.php");
}


?>

<!--
THIS PROJECT HANDLED ON BY
-EMRE TUFEKCI ===> All Bootsrap Functionality and HTML&HTML Comments
-ERCAN HAVARE ===> All Backend Functionality and Javascript Warnings
-SAMED BICER  ===> Documentation
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

        #logout a{
          font-size: 20px;
          margin-left: 80px;
          color: red;
        }
    </style>



</head>

<body>

  <h1 class="display-4 text-center border border-light bg-light ">Car Plate Management System <span id="logout"><a href="logout.php">logout!</a></span></h1>
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

            <?php
              $sorgu="SELECT * FROM car_info";
              $result=mysql_query($sorgu);
              if(!$result) die("Something goes wrong!#001".@mysql_error());
            ?>

            <?php while ($row=mysql_fetch_array($result)) {  ?>
                <tr class="text-center">
                    <td><?php echo strtoupper($row['car_model']);?></td>
                    <td id="plate" class="text-white bg-secondary border"><?php echo strtoupper($row['car_plate']);?></td>
                    <td><?php echo strtoupper($row['driver_full_name']);?></td>


                    <?php
                    // this paramater going to for update function and delete function
                    $paramId = $row['id']; $paramCarPlate = strtoupper($row['car_plate']);
                     ?>

                    <td><button id="edt1" onclick="editFunc(<?php echo $paramId.","."'$paramCarPlate'"; ?>);" type="submit" class="btn btn-primary" value="<?php echo $row['id']?>">Edit</button> </td>
                    <td><button onclick="deleteFunc(<?php echo $paramId.","."'$paramCarPlate'"; ?>);" type="submit" class="btn btn-danger" value="delete">Delete</button></td>
                </tr>
            <?php  }    ?>

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

function editFunc(id,carPlate) {
  // edit functionality
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover "+carPlate+" car plate!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
  // sending row id for update
  if(willDelete){
    window.location='editPage.php?id='+id;
  }else{
    swal("Your record is safe!");
  }


    });
}

function deleteFunc(id,carPlate) {
// delete functionality
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover "+carPlate+" car plate!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
// sending row id for delete
  if(willDelete){
    window.location='delete.php?id='+id;

  }else{
    swal("Your record is safe!");
  }

  });
  }
</script>
</html>
