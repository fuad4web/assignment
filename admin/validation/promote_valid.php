<?php 
    include '../../core/init.php';
    
    if(isset($_POST['promote_student'])) {
        if(isset($_POST['check'])) {

            foreach($_POST['check'] as $checkid) {
                $semester = $_POST['semester_'.$checkid];
                $semester += 2;
                $getFromU->update('user', $checkid, array('semester' => $semester));
                $_SESSION['SuccessMessage'] = "Student Promoted Successfully";
                header('Location: ../promotion');
            }

        }
    }

    ?>
