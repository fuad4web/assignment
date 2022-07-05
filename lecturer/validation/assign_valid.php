<?php   

include '../../core/init.php';
$user_id = $_SESSION['id'];
$letters = 'abcdefghijklmnopqrstuvwxyz';
$numbers = rand(111, 9999);
$let = str_shuffle(substr($letters, 0, 6));

if(isset($_POST['save_question'])) {

    $course_id = $_POST['course_id'];
    $assign_question = $_POST['assign_question'];
    $assign_answer = $_POST['assign_answer'];
    $level = $_POST['level'];
    $dept = $_POST['dept'];

    if(!empty($course_id) || !empty($assign_question) || !empty($assign_answer) || !empty($level) || !empty($dept)) {

        $course_id = $getFromU->checkInput($course_id);
        $assign_question = $getFromU->checkInput($assign_question);
        $assign_answer = $getFromU->checkInput($assign_answer);
        $level = $getFromU->checkInput($level);
        $dept = $getFromU->checkInput($dept);

        $getFromU->create('questions', array('user_id' => $user_id, 'course_id' => $course_id, 'question' => $assign_question, 'answer' => $assign_answer, 'code' => $let, 'level' => $level, 'dept' => $dept));

        $_SESSION['SuccessMessage'] = "Question Successfully Sent";
        header('Location: ../assign_assignment');

    }

}

?>
