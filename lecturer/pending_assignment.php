
<?php 
  include '../element/header.php';

  if($user->status !== 'lecturer') {
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
            <h1 class="m-0 text-dark">Pending Assignments</h1>
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

            $pending_assignments = $getFromU->fetch_questions_innerjoin_one_cond('answers', 'user', 'lecturer_id', $user_id, 'done', 0);
            foreach($pending_assignments as $pending_assignment):
                $student_name = $getFromU->select_one_val('user', 'fullname', 'id', $pending_assignment->user_id);
                $lecturer_course = $getFromU->select_one_val('course', 'course', 'id', $pending_assignment->course_id);
                $question_id = $getFromU->select_one_val('answers', 'question_id', 'question_id', $pending_assignment->question_id);
                // var_dump($question_id);
        ?>
        
            <div class="row">
                <div class="col-md">
                    <div class="callout callout-danger">
                        <h5>Student Name:&nbsp;<?= @$student_name->fullname; ?></h5>
                        <h5>Course:&nbsp;<?= $lecturer_course->course; ?></h5>
                        <br>

                        <?php
                            echo nl2br(htmlspecialchars_decode(stripslashes($pending_assignment->answer)));
                        ?>
                        <br>
                        <a href="lecturer/assignment_answered?sem=<?= $pending_assignment->level ?>&dept=<?= $pending_assignment->dept ?>&que=<?= $question_id->question_id ?>" class="btn btn-primary">Give Mark</a>
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
