<?php
include '../../core/init.php';

if(isset($_POST['reg_admin'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']);

  if(!empty($fullname) || !empty($email) || !empty($phone) || !empty($gender) || !empty($password)) {

      $fullname = $getFromU->checkInput($fullname);
      $email = $getFromU->checkInput($email);
      $phone = $getFromU->checkInput($phone);
      $gender = $getFromU->checkInput($gender);
      $password = $getFromU->checkInput($password);

        if($getFromU->check_exist_one_col('user', 'email', $email) === true) {
            $_SESSION['ErrorMessage'] = "Email Existing";
            header('Location: ../register_admin');
        } else {

            if($getFromU->check_exist_one_col('user', 'phone_no', $phone) === true) {
                $_SESSION['ErrorMessage'] = "Phone Number Existing";
                header('Location: ../register_admin');
            } else {
                
                $getFromU->create('user', array('fullname' => $fullname, 'email' => $email, 'phone_no' => $phone, 'password' => $password, 'status' => 'admin', 'approve' => 1, 'gender' => $gender));

                $_SESSION['SuccessMessage'] = "Admin Successfully Added";
                header('Location: ../register_admin');
                
            }
            
        }
    }
}

?>
