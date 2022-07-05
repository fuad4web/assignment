<?php 
    include '../core/init.php';

    if(isset($_POST['login'])) {
        //email and password listed from this post is from the database
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) or !empty($password)) {
            //this is checking it from databse through the class created
            $email = $getFromU->checkInput($email);
            $password = $getFromU->checkInput($password);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $_SESSION['ErrorMessage'] = "Invalid Email Address";
                header('Location: ../login');

            } else {

                if($getFromU->login($email, md5($password)) == false) {
                    $_SESSION['ErrorMessage'] = "Incorrect Email or Password";
                    echo '<script>window.location.href="../login"</script>';
                } elseif($getFromU->login($email, md5($password)) == 'inapprove') {
                    // header('Location: '.BASE_URL.'dashboard/dashboard?');
                    $_SESSION['ErrorMessage'] = "You have not yet been approve";
                    echo '<script>window.location.href="../login"</script>';
                } else {
                    $_SESSION['SuccessMessage'] = "Login Successful";
                    echo '<script>window.location.replace("'.BASE_URL.'dashboard");</script>';
                }
                
            }
        }
    }

?>
