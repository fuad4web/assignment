<?php
include '../../core/init.php';

if(isset($_POST['savedept'])) {

  $faculty_value = $_POST['faculty_value'];
  $dept_name = $_POST['dept_name'];

  if(!empty($faculty_value) || !empty($dept_name)) {

      $faculty_value = $getFromU->checkInput($faculty_value);
      $dept_name = $getFromU->checkInput($dept_name);

        if($getFromU->check_exist_one_col('department', 'department', $dept_name) === true) {
            $_SESSION['ErrorMessage'] = "Department Existing";
            header('Location: ../department');
        } else {

            $getFromU->create('department', array('department' => $dept_name, 'faculty_id' => $faculty_value));

            $_SESSION['SuccessMessage'] = "Department Created Successfully";
            header('Location: ../department');

        }
  }
}

?>
