<?php
include '../core/init.php';

if(isset($_POST['register'])) {

  $firstname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $confirm_password = $_POST['confirm_password'];

  if(!empty($firstname) || !empty($email) || !empty($password) || !empty($dob) || !empty($gender) || !empty($phone)) {

      $firstname = $getFromU->checkInput($firstname);
      $email = $getFromU->checkInput($email);
      $dob = $getFromU->checkInput($dob);
      $gender = $getFromU->checkInput($gender);
      $phone = $getFromU->checkInput($phone);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $_SESSION['ErrorMessage'] = "Invalid Email Address";
         header('Location: ../register');
      } else {

          if($getFromU->check_exist_one_col('user', 'email', $email) === true) {
            $_SESSION['ErrorMessage'] = "Email Address Already used";
            header('Location: ../register');
          } else {

              if($getFromU->check_exist_one_col('user', 'phone_no', $phone) === true) {
                  $_SESSION['ErrorMessage'] = "Phone Number Existing";
                  header('Location: ../register');
              } elseif($password != $confirm_password) {
                    $_SESSION['ErrorMessage'] = "Password didn't match";
                    header('Location: ../register');
              } else {
                $getFromU->create('user', array('fullname'=>$firstname, 'status'=>'student', 'approve' => 0, 'email'=>$email, 'password' => md5($password), 'dob' => $dob, 'gender'=>$gender, 'phone_no'=>$phone, 'semester' => 1));

                $_SESSION['SuccessMessage'] = "Registration Successful";
                header('Location: ../login');
              }
         }
      }
  }
}
?>
