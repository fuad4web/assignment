
<?php 
  include '../element/header.php';

  if($user->status !== 'student') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }
  
  include '../element/sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Assignments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Assignment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
        <?php 
            echo SuccessMessage();
            echo ErrorMessage();

            $assignments = $getFromU->fetch_innerjoin_two_cond_two_on('questions', 'user', 'level', $user->semester, 'dept', $user->department);
            foreach($assignments as $assignment):
                $lecturer_name = $getFromU->select_one_val('user', 'fullname', 'id', $assignment->user_id);
                $lecturer_course = $getFromU->select_one_val('course', 'course', 'id', $assignment->course_id);
                $que_id = $getFromU->select_one_val('questions', 'id', 'dept', $assignment->department);
                $scores = $getFromU->select_one_val_two_conds('answers', 'scores', 'user_id', $user_id, 'question_id', $que_id->id);
                $answer_2_question = $getFromU->select_one_val_two_conds('answers', 'answer', 'user_id', $user_id, 'question_id', $que_id->id);
        ?>
        
            <div class="row">
                <div class="col-md">
                    <div class="callout callout-danger">
                        <div class="row">
                          <div class="col-md-5">
                            <h5>Lecturer Name:&nbsp;<?= $lecturer_name->fullname; ?></h5>
                            <h5>Course:&nbsp;<?= $lecturer_course->course; ?></h5>
                          </div>

                        <?php 
                          $check_assignment = $getFromU->select_one_val_two_conds('answers', 'done', 'user_id', $user_id, 'question_id', $que_id->id);

                          if($check_assignment->done == 0) {
                        ?>
                          <div class="col-md-4">
                            <span class="bg-danger text-white px-4 py-2" style="border-radius: 10px;">Pending</span>
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="Scores" value="" disabled>
                          </div>
                        <?php 
                          } else {
                        ?>
                          <div class="col-md-4">
                            <span class="bg-blue text-white px-4 py-2" style="border-radius: 10px;">Marked</span>
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="form-control" value="<?= $scores->scores ?>" disabled>
                          </div>
                        <?php 
                          }
                        ?>

                        </div>
                        <br>

                        <?php
                            echo nl2br(htmlspecialchars_decode(stripslashes($assignment->question)));
                        ?>

                        <br>
                        <?php 
                          if($check_assignment->done == 0) {
                        ?>
                        <a href="student/assignment?sem=<?= $assignment->level ?>&dept=<?= $assignment->dept ?>&que=<?= $assignment->code ?>" class="btn btn-outline-primary">Answer Question</a>
                        <?php 
                          } else {
                        ?>
                        <h3>My Answer</h3>
                        <?php
                            echo nl2br(htmlspecialchars_decode(stripslashes($answer_2_question->answer)));
                        ?>

                        <?php 
                          }
                        ?>
                    </div>
                </div>
            </div>

        <?php 
            endforeach;
        ?>

        </div>
    </section>

<?php 
  include '../element/footer.php';
?>
