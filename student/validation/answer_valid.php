<?php   

include '../../core/init.php';

$user_id = $_SESSION['id'];

if(isset($_POST['answer_question'])) {

    $course_id = $_POST['course_id'];
    $question_id = $_POST['question_id'];
    $answer = $_POST['answer'];
    $lecturer_id = $_POST['lecturer_id'];

    $level = $_POST['sem_id'];
    $dept = $_POST['dept_id'];

    if(!empty($course_id) || !empty($answer) || !empty($lecturer_id) || !empty($level) || !empty($dept)) {
        $answer = $getFromU->checkInput($answer);

        if($getFromU->check_exist_two_col('answers', 'answer', 'user_id', $user_id, 'question_id', $question_id) == true) {
            $_SESSION['ErrorMessage'] = "You've already answered this question";
            header('Location: ../assignments');
        } else {
            $getFromU->create('answers', array('user_id' => $user_id, 'course_id' => $course_id, 'question_id' => $question_id, 'answer' => $answer, 'lecturer_id' => $lecturer_id, 'level' => $level, 'dept' => $dept));

            $_SESSION['SuccessMessage'] = "Answer Successfully Sent";
            header('Location: ../assignments');
        }

    }

}

?>
