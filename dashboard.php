<?php 
    include_once('core/init.php');
   
    $user_id = $_SESSION['id'];
    $user = $getFromU->userData($user_id);
   
    if($user->status === 'lecturer') {
        echo '<script>window.location.href = "lecturer/dashboard";</script>';
    } elseif($user->status === 'student') {
        echo '<script>window.location.href = "student/dashboard";</script>';
    } elseif($user->status === 'admin') {
        echo '<script>window.location.href = "admin/dashboard";</script>';
    } else {
        echo '<script>window.location.href="index";</script>';
    }

?>
