
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/sweetalert.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Windows10
 * Date: 4/1/2018
 * Time: 9:39 AM
 */

// database connection
$databaseCon = new Database();

// define variables and set to empty values
$carModelErr = $carPlateErr = $driverFullNameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $driver_full_name = $_POST["full_name"];
    $car_model = $_POST["car_model"];
    $car_plate = $_POST["car_plate"];


    /////////////////  check if car model does not fill //////////////////////
    if (empty($car_model)) {
        $carModelErr= "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning\",\"Car model is required!\",\"info\");
                  });
			  </script>";
    } else {
        //validation
        $car_model_control = DataInputControl::input_control($car_model);
        // check if car model only contains letters and white space
        if (!preg_match("/^[a-zA-Z ]*$/", $car_model_control)) {
            $carModelErr = "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning\",\"Only letters and white space allowed\",\"info\");
                  });
			  </script>";
        }
    }
    /////////////////  check if car model does not fill //////////////////////



    /////////////////  check if car plate does not fill //////////////////////
    if (empty($car_plate)) {
        $carPlateErr= "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning\",\"Car plate is required!\",\"info\");
                  });
			  </script>";
    } else {
        //validation
        $car_plate_control = DataInputControl::input_control($car_model);
        // check if car model only contains letters and white space
        if (!preg_match("/^[a-zA-Z ]*$/", $car_plate_control)) {

            $carPlateErr = "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning\",\"Only letters and white space allowed\",\"info\");
                  });
			  </script>";
        }
    }
    /////////////////  check if car plate does not fill //////////////////////



    /////////////////  check if full name does not fill //////////////////////
    if (empty($driver_full_name)) {
        $driverFullNameErr= "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning\",\"Full name is required!\",\"info\");
                  });
			  </script>";
    } else {
        //validation
        $driver_full_name_control = DataInputControl::input_control($driver_full_name);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $driver_full_name_control)) {
            $driverFullNameErr =  "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning\",\"Only letters and white space allowed\",\"info\");
                  });
			  </script>";
        }
    }
    /////////////////  check if full name does not fill //////////////////////


    /////////////////  check if licence agree //////////////////////
    if (isset($_POST["accepted"])) {
        //////// if licence agree, record it into database ////////////////////////////////
        $save = $databaseCon->insertRow("INSERT INTO car_info(driver_full_name,car_model,car_plate) VALUES(?,?,?)",
            [$_POST["full_name"], $_POST["car_model"], $_POST["car_plate"]]);
        //////////////////// was it informations recorded ///////////////////
            if ($save){
                echo "<script>
			  	$( document ).ready(function() {
                    swal(\"Good job!\", \"Your information recorded.\", \"success\");
                  });
			  </script>";
            }else{
                echo "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning!\", \"Sorry, something goes wrong.\", \"error\");
                  });
			  </script>";
            }
        ////////////////////////// was it informations recorded /////////////////////

        //////// did not get a license //////////////////////////////////
    } else {
        echo "<script>
			  	$( document ).ready(function() {
                    swal(\"Warning\",\"Please accept agreement!\",\"info\");
                  });
			  </script>";
    }
    //////// did not get a license ////////////////////////////////
    /////////////////  check if licence agree //////////////////////

}
?>

