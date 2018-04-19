<!DOCTYPE html>

<!--
THIS PROJECT HANDLED ON BY
-EMRE TUFEKCI ===> All Bootsrap Functionality and HTML&HTML Comments
-ERCAN HAVARE ===> All Backend Functionality and Javascript Warnings
-SAMED BICER  ===> Documentation
-->
<html>
<head>
    <title>Car Plate Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../fa/webfont/css/fontawesome-all.css">
    <style>
        body {
            background-image: url("../images/bg1.jpeg");
            background-color: #cccccc;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }
        @media (max-width: 480px) {
        }
        @media (max-width: 720px) {
        }
        @media (max-width: 1024px) {
        }
        #cardContainer {
            float: text-center;
            margin-top: 10%;
        }
        .navbar {
            opacity: 0.6;
            filter: alpha(opacity=60);
        }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a style="color:blue;" class="navbar-brand" href="#">Car Plate Admin Login</a>
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

<!--Card Container-->
<div class="container col-sm-4" id="cardContainer">
  <!--Card Container-->


  <!-- Card -->
    <div class="card w-100">
      <!-- Card -->


        <!-- Form -->
        <form name="loginForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <!-- Form -->

              <!-- Card Body -->
            <div class="card-body">
              <!-- Card Body-->


                <!--Username-->
                <div class="form-group form-group-sm col-sm">
                    <div class="row">
                        <label for="carmodel" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-lg" name="username" id="username"
                                   placeholder="Username"/>
                        </div>
                    </div>
                </div>
                <!--Username-->


                <!-- Password -->
                <div class="form-group form-group-sm col-sm">
                    <div class="row">
                        <label for="carplate" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control form-control-lg" name="password" id="password"
                                   placeholder="Password"/>
                        </div>
                    </div>
                </div>
                <!-- Password -->





            <!-- Card Body -->
            </div>
            <!-- Card Body-->


            <!--Submit Row-->
                <div class="card-footer text-muted">
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <div class="col-sm-12">
                                <button type="submit" name="submitLogin" class="btn btn-success btm-lg btn-block">
                                    Login
                                </button>
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

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


<?php
	include ("validate.php");
?>

</body>
</html>
