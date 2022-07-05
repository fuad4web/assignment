<?php   

include '../../core/init.php';
$user_id = $_SESSION['id'];

if(isset($_POST['input_scores'])) {

    $answer_id = $_POST['answer_id'];
    $scores = $_POST['scores'];

    if(!empty($answer_id) || !empty($scores)) {

        $answer_id = $getFromU->checkInput($answer_id);
        $scores = $getFromU->checkInput($scores);

        $up = $getFromU->update('answers', $answer_id, array('scores' => $scores, 'done' => 1));
        $_SESSION['SuccessMessage'] = "Scores Successfully Updated";
        header('Location: ../pending_assignment');

    }

}

?>
