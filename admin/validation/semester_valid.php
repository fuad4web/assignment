<?php
include '../../core/init.php';

if(isset($_POST['savesemester'])) {

  $semester = $_POST['semester'];
  $semester_slug = $_POST['semester_slug'];

  if(!empty($semester)) {

      $semester = $getFromU->checkInput($semester);
      $semester_slug = $getFromU->checkInput($semester_slug);

        if($getFromU->check_exist_one_col('semester', 'semester', $semester) === true) {
            $_SESSION['ErrorMessage'] = "Semester Existing";
            header('Location: ../semester');
        } else {

            $getFromU->create('semester', array('semester'=>$semester, 'slug' => $semester_slug));

            $_SESSION['SuccessMessage'] = "Semester Created Successfully";
            header('Location: ../semester');

        }
  }
}

?>
