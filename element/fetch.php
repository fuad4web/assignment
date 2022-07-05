<?php

    include '../core/init.php';

    if(isset($_POST['valuess'])){
        $course_id = $_POST['valuess'];

        $selectDept = $getFromU->select_one_val('course', 'dept_id', 'id', $course_id);
        
            $i = 0;
            $htmlo = '';

            $htmlo .= $selectDept->dept_id;
            
        echo $htmlo;
    }

    ?>
    