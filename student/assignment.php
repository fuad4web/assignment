
<?php 
  include '../element/header.php';

  if($user->status !== 'student') {
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
                    $assignment = $getFromU->fetch_innerjoin_three_cond_two_on('questions', 'user', 'level', $get_semester, 'dept', $get_dept, 'code', $get_que);
                    foreach($assignment as $assign):
                        $question_id = $getFromU->select_one_val('questions', 'id', 'code', $assign->code);
                ?>
                    <form action="student/validation/answer_valid.php" class="my-5" method="POST">
                        <div class="card card-info">

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
                            </div>

                        </div>

                        <div class="card card-info">

                            <div class="card-header">
                                <h3 class="card-title">Answer</h3>
                            </div>
                            
                            <div class="card-body">
                                <textarea class="textarea" id="textEditor" placeholder="Type Out Your Question(s) here....." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="answer" required></textarea>
                            </div>

                        </div>
                        <div class="card-footer">
                            <center>
                                <button type="submit" onclick="return confirm('Are you sure you wanna submit this?');" name="answer_question" class="btn btn-danger mx-auto">Submit Answer</button>
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
        echo '<script>window.location.href="'.BASE_URL.'student/dashboard"</script>';
    }

    include '../element/footer.php';
  ?>
