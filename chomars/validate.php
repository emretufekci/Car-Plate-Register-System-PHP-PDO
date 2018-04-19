<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Ercan Havare
 * Date: 4/3/2018
 * Time: 8:40 PM
 */

include ("../db/database.php");
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name=$_POST["username"];
  $password=$_POST["password"];

checkUserNameFunction($user_name,$password);
}

function checkUserNameFunction($user_name,$password){
  /////////////////  check if user_name does not fill //////////////////////

  if (empty($user_name)) {

      echo "<script>
        $( document ).ready(function() {
                  swal(\"Warning\",\"User name is required!\",\"info\");
                });
      </script>";
  } else {

      //validation
      $user_name_control = input_control($user_name);
      // check if user_name only contains letters and blank space

      if (!preg_match("/^[a-zA-Z ]*$/", $user_name_control)) {

          echo "<script>
        $( document ).ready(function() {
                  swal(\"Warning\",\"Only letters and blank space allowed\",\"info\");
                });
      </script>";
    }else{

      checkPasswordFunction($user_name,$password);
    }
  }
  /////////////////  check if user_name does not fill //////////////////////
}


function checkPasswordFunction($user_name,$password){
  /////////////////  check if password does not fill //////////////////////

  if (empty($password)) {
      echo "<script>
        $( document ).ready(function() {
                  swal(\"Warning\",\"Password is required!\",\"info\");
                });
      </script>";
  } else {

      //validation
      $password_control = input_control($password);
      // check if name only contains letters and blank space
      if (!preg_match("/^[a-zA-Z0-9 ]*$/", $password_control)) {
  
          echo  "<script>
        $( document ).ready(function() {
                  swal(\"Warning\",\"Only letters and blank space allowed\",\"info\");
                });
      </script>";
    }else{

      $query=mysql_query("SELECT * FROM chomars_admin WHERE username='".$user_name."' and password='".$password."'") or die (mysql_error());
      $result=mysql_fetch_array($query);

      if($result['permission']==1){
        @session_start();
        $_SESSION["admin"]=true;
        $_SESSION["user"]=$result["username"];

        echo "<script>
          function waitPage(){
            window.location='admin.php';
          }
        </script>";


        echo "<script>
        $( document ).ready(function() {
                  swal(\"Welcome!\", \"You are welcome ".$result["username"]."\", \"success\");
                });
              </script>";

              echo "<script>
                setTimeout('waitPage()',3000);
              </script>";


      }else{
        echo "<script>
        $( document ).ready(function() {
                  swal(\"Stop!\", \"Sorry, you are not admin.\", \"error\");
                });
              </script>";
      }

    }
  }
  /////////////////  check if password does not fill //////////////////////
}


function input_control($data)
{
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
