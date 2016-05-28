<?php
function check_login($redirect, $check_admin=false)
{
  $redirect_boolean = true;
  $error_message = 'some_error'
  if (isset($_SESSION["user_id"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["pic_path"]) && isset($_SESSION["about"]) && isset($_SESSION["user_type"]) && isset($_SESSION["logged_in"]) && isset($_SESSION["username"]))
  {
    if ($_SESSION["logged_in"]) {
      if ($check_admin) {
        if ($_SESSION["user_type"] == 0) {
          $redirect_boolean = false;
        }
      } else {
        $redirect_boolean = false;
      }
    }
  }
  if ($redirect_boolean) {
    header('location:'.$redirect.'?error='.$error_message);
		exit();
  }
}
?>
