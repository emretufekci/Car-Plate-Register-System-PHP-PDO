<!DOCTYPE html>

<!--
THIS PROJECT HANDLED ON BY
-EMRE TUFEKCI ===> All Bootsrap Functionality and HTML&HTML Comments
-ERCAN HAVARE ===> All Backend Functionality and Javascript Warnings
-SAMED BICER  ===> Documentation
-->
<html>
<head>
    <title>Car Plate - Edit Page</title>
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a style="color:blue;" class="navbar-brand" href="#">Car Plate Edit Page</a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        </ul>
        <span class="navbar-text">
    <div style="font-size:2em; color:Black">
		<a href="https://github.com/emretufekci/Car-Plate-Program"><i class="fab fa-github"></i></a>
	</div>
    </span>
    </div>
</nav>
<?php
  // check the come from admin page , is id there or not
@include("editPageGetControl.php");

?>
<!--Card Container-->
<div class="container col-sm-6" id="cardContainer">
  <!--Card Container-->


  <!-- Card -->
    <div class="card w-100">
      <!-- Card -->


        <!-- Form -->
        <form name="editForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <!-- Form -->

              <!-- Card Body -->
            <div class="card-body">
              <!-- Card Body-->


          <!--Car Model-->
                <div class="form-group form-group-sm col-sm">
                    <div class="row">
                        <label for="car_model" class="col-sm-4 col-form-label">Car Model</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="car_model" id="car_model"
                                   value="<?php echo @$row['car_model']?>"/>
                        </div>
                    </div>
                </div>
                <!--Car Model-->


            <!--Car Plate-->
                <div class="form-group form-group-sm col-sm">
                    <div class="row">
                        <label for="car_plate" class="col-sm-4 col-form-label">Car Plate</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="car_plate" id="car_plate"
                                   value="<?php echo @$row['car_plate']?>"/>
                        </div>
                    </div>
                </div>
                <!--Car Plate-->

				    <!--Full Name Of The Driver-->
                <div class="form-group form-group-sm col-sm">
                    <div class="row">
                        <label for="full_name" class="col-sm-12 col-form-label">Full Name Of The Driver</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="full_name" id="full_name"
                                   value="<?php echo @$row['driver_full_name']?>"/>
                        </div>
                    </div>
                </div>
                <!--Full Name Of The Driver-->

            <!-- Card Body -->
            </div>
            <!-- Card Body-->


            <!--Submit Row-->
                <div class="card-footer text-muted">
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <div class="col-sm-12">
                              <!--Turn back admin.php-->
                                <a href="admin.php"><button type="button" name="submitLogin" class="btn btn-primary btm-lg ">
                                    Turn Back
                                </button></a>
                                <!--update button-->
                                <button type="submit" name="submitLogin" class="btn btn-primary btm-lg ">
                                    Update
                                </button>
                                <!--for update-->
                                <input type="hidden" name="update" value="<?php echo @$row['id']?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            <!--Submit Row-->


            <!-- Card -->
            </div>
            <!-- Card -->

    <!-- Card Container -->
    </div>
    <!-- Card Container -->

<!-- Form -->
</form>
<!-- Form -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
	include("update.php");
?>

</body>
</html>
