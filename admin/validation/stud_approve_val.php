<?php
include '../../core/init.php';

if(isset($_POST['approve_student'])) {

    $student_id = $_POST['student_id'];

  if(!empty($student_id)) {
    $getFromU->update('user', $student_id, array('approve' => 1));
    $_SESSION['SuccessMessage'] = "Student Successfully Approve";
    header('Location: ../student_approve');
  }

}

?>
