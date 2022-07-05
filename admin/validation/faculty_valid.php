<?php
include '../../core/init.php';

if(isset($_POST['savefaculty'])) {

  $faculty_name = $_POST['faculty_name'];

  if(!empty($faculty_name)) {

      $faculty_name = $getFromU->checkInput($faculty_name);

        if($getFromU->check_exist_one_col('faculty', 'faculty', $faculty_name) === true) {
            $_SESSION['ErrorMessage'] = "Faculty Existing";
            header('Location: ../faculty');
        } else {

            $getFromU->create('faculty', array('faculty'=>$faculty_name));

            $_SESSION['SuccessMessage'] = "Faculty Created Successfully";
            header('Location: ../faculty');

        }
  }
}

?>
