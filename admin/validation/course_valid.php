<?php
include '../../core/init.php';

if(isset($_POST['savecourse'])) {

  $dept_value = $_POST['dept_value'];
  $course_title = $_POST['course_title'];
  $course_name = $_POST['course_name'];

  if(!empty($dept_value) || !empty($course_name) || !empty($course_title)) {

      $dept_value = $getFromU->checkInput($dept_value);
      $course_name = $getFromU->checkInput($course_name);
      $course_title = $getFromU->checkInput($course_title);

        if($getFromU->check_exist_one_col('course', 'course', $course_name) === true) {
            $_SESSION['ErrorMessage'] = "Course Existing";
            header('Location: ../course');
        } else {

            if($getFromU->check_exist_one_col('course', 'course_title', $course_title) === true) {
                $_SESSION['ErrorMessage'] = "Course Title Existing";
                header('Location: ../course');
            } else {
                $getFromU->create('course', array('course' => $course_name, 'course_title' => $course_title, 'dept_id' => $dept_value));

                $_SESSION['SuccessMessage'] = "Course Created Successfully";
                header('Location: ../course');
            }
            
        }
  }
}

?>
