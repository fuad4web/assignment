<?php
include '../../core/init.php';

if(isset($_POST['register_lect'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $dob = $_POST['dob'];
    $departm = $_POST['departm'];
    $password = md5($_POST['password']);

  if(!empty($fullname) || !empty($email) || !empty($phone) || !empty($gender) || !empty($course) || !empty($dob) || !empty($password)) {

      $fullname = $getFromU->checkInput($fullname);
      $email = $getFromU->checkInput($email);
      $phone = $getFromU->checkInput($phone);
      $gender = $getFromU->checkInput($gender);
      $course = $getFromU->checkInput($course);
      $dob = $getFromU->checkInput($dob);
      $departm = $getFromU->checkInput($departm);
      $password = $getFromU->checkInput($password);

        if($getFromU->check_exist_one_col('user', 'email', $email) === true) {
            $_SESSION['ErrorMessage'] = "Email Existing";
            header('Location: ../register_lecturer');
        } else {

            if($getFromU->check_exist_one_col('user', 'phone_no', $phone) === true) {
                $_SESSION['ErrorMessage'] = "Phone Number Existing";
                header('Location: ../register_lecturer');
            } else {
                if($getFromU->check_exist_two_col('user', 'course', 'course', $course, 'status', 'lecturer') === true) {
                    $_SESSION['ErrorMessage'] = "Course not Available";
                    header('Location: ../register_lecturer');
                } else {
                    $getFromU->create('user', array('fullname' => $fullname, 'email' => $email, 'phone_no' => $phone, 'department' => $departm, 'course' => $course, 'password' => $password, 'status' => 'lecturer', 'approve' => 1, 'gender' => $gender, 'dob' => $dob));
    
                    $_SESSION['SuccessMessage'] = "Lecturer Successfully Added";
                    header('Location: ../register_lecturer');
                }
                
            }
            
        }
    }
}

?>
