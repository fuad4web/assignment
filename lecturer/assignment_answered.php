
<?php 
  include '../element/header.php';

  if($user->status !== 'lecturer') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }
  
  include '../element/sidebar.php';

  @$get_semester = $_GET['sem'];
  @$get_dept = $_GET['dept'];
  @$get_que = $_GET['que'];

  if(isset($_GET['sem']) && isset($_GET['dept']) && isset($_GET['que'])) {
?>

<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content my-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                <?php 
                    $assignment = $getFromU->fetch_innerjoin_three_cond_three_on('answers', 'questions', $get_semester, $get_dept, $get_que);
                    foreach($assignment as $assign):
                        $question_id = $getFromU->select_one_val('questions', 'id', 'code', $assign->code);
                        $student_answer = $getFromU->select_one_val('answers', 'answer', 'question_id', $question_id->id);
                        $answer_id = $getFromU->select_one_val('answers', 'id', 'question_id', $question_id->id);
                ?>
                    <form action="lecturer/validation/update_scores.php" class="my-5" method="POST">
                        <div class="card card-info">

                            <center>
                                <input type="number" name="scores" placeholder="Input Student Scores" class="form-control text-center my-3" style="width: 200px;" required>
                            </center>

                            <div class="card-header">
                                <h3 class="card-title">Question</h3>
                            </div>
                            
                            <div class="card-body">
                                <?php 
                                    echo nl2br(htmlspecialchars_decode(stripslashes($assign->question)));
                                ?>
                                <input type="hidden" name="question_id" value="<?= $question_id->id; ?>">
                                <input type="hidden" name="lecturer_id" value="<?= $assign->user_id ?>">
                                <input type="hidden" name="course_id" value="<?= $assign->course_id ?>">
                                <input type="hidden" name="sem_id" value="<?= $get_semester ?>">
                                <input type="hidden" name="dept_id" value="<?= $get_dept ?>">
                                <input type="hidden" name="answer_id" value="<?= $answer_id->id ?>">
                            </div>

                        </div>

                        <div class="card card-info">

                            <div class="card-header">
                                <h3 class="card-title">Answer</h3>
                            </div>
                            
                            <div class="card-body">
                                <?php 
                                    echo nl2br(htmlspecialchars_decode(stripslashes($student_answer->answer)));
                                ?>
                            </div>

                        </div>
                        <div class="card-footer">
                            <center>
                                <button type="submit" onclick="return confirm('Are you sure you wanna submit this?');" name="input_scores" class="btn btn-danger mx-auto">Submit Answer</button>
                            </center>
                        </div>
                    </form>
                    <?php 
                        endforeach;
                    ?>

                </div>

            </div>
        </div>
    </section>
    <!-- /.end main content -->

</div>
  
  <?php 

    } else {
        echo '<script>window.location.href="'.BASE_URL.'lecturer/dashboard"</script>';
    }

    include '../element/footer.php';
  ?>
