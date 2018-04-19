<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Ercan Havare
 * Date: 4/1/2018
 * Time: 9:39 AM
 */

include("database.php");
// define variables and set to empty values
$carModelErr = $carPlateErr = $driverFullNameErr = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $driver_full_name = $_POST["full_name"];
    $car_model = $_POST["car_model"];
    $car_plate = $_POST["car_plate"];

    checkCarModelFunction($car_model,$car_plate,$driver_full_name);
}
    function checkCarModelFunction($car_model,$car_plate,$driver_full_name){
      /////////////////  check if car model does not fill //////////////////////
      if (empty($car_model)) {
          echo "<script>
            $( document ).ready(function() {
                      swal(\"Warning\",\"Car model is required!\",\"info\");
                    });
          </script>";
      } else {
          //validation
          $car_model_control = input_control($car_model);
          // check if car model only contains letters and blank space
          if (!preg_match("/^[a-zA-Z ]*$/", $car_model_control)) {
              echo "<script>
            $( document ).ready(function() {
                      swal(\"Warning\",\"Only letters and blank space allowed\",\"info\");
                    });
          </script>";
        }else{
          checkCarPlateFunction($car_model,$car_plate,$driver_full_name);
        }
      }
      /////////////////  check if car model does not fill //////////////////////
    }

    function checkCarPlateFunction($car_model,$car_plate,$driver_full_name){
      /////////////////  check if car plate does not fill //////////////////////
      if (empty($car_plate)) {
          echo "<script>
            $( document ).ready(function() {
                      swal(\"Warning\",\"Car plate is required!\",\"info\");
                    });
          </script>";
      } else {
          //validation
          $car_plate_control = input_control($car_plate);
          // check if car model only contains letters and blank space
          if (!preg_match("/^[a-zA-Z0-9 ]*$/", $car_plate_control)) {
              echo "<script>
            $( document ).ready(function() {
                      swal(\"Warning\",\"Only letters and blank space allowed\",\"info\");
                    });
          </script>";
        }else{
          checkFullNameFunction($car_model,$car_plate,$driver_full_name);
        }
      }
      /////////////////  check if car plate does not fill //////////////////////
    }

    function checkFullNameFunction($car_model,$car_plate,$driver_full_name){
      /////////////////  check if full name does not fill //////////////////////
      if (empty($driver_full_name)) {
          echo "<script>
            $( document ).ready(function() {
                      swal(\"Warning\",\"Full name is required!\",\"info\");
                    });
          </script>";
      } else {
          //validation
          $driver_full_name_control = input_control($driver_full_name);
          // check if name only contains letters and blank space
          if (!preg_match("/^[a-zA-Z ]*$/", $driver_full_name_control)) {
              echo  "<script>
            $( document ).ready(function() {
                      swal(\"Warning\",\"Only letters and blank space allowed\",\"info\");
                    });
          </script>";
        }else{
          checkLicenceAcceptedFunction($car_model,$car_plate,$driver_full_name);
        }
      }
      /////////////////  check if full name does not fill //////////////////////
    }

    function checkLicenceAcceptedFunction($car_model,$car_plate,$driver_full_name){
      /////////////////  check if licence agree //////////////////////
      if (isset($_POST["accepted"])) {
          //////// if licence agree, record it into database ////////////////////////////////
          $table="car_info";
          $save = sprintf("INSERT INTO %s (driver_full_name,car_model,car_plate) VALUES('%s','%s','%s')",
                        $table,$driver_full_name,$car_model,$car_plate);
          //////////////////// was it informations recorded ///////////////////
              if (mysql_query($save)){
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

    function input_control($data)
    {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
?>
