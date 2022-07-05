
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
            <h1 class="m-0 text-dark">List Assignments</h1>
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
            $assignments = $getFromU->select_all_one_cond_desc('questions', 'user_id', $user->id);
            $no_of_assignments = $getFromU->count_ono_cond('questions', 'id', 'user_id', $user_id);
            $i = $no_of_assignments;
            foreach($assignments as $assignment):
              $i--;
        ?>
        
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Assignment <?= $i + 1; ?></h5>
              </div>
              <div class="card-body">
                <?php
                  $assign = substr($assignment->question, 0, 40);
                  echo nl2br(htmlspecialchars_decode(stripslashes($assignment->question)));
                ?>
                <br>
                <a href="lecturer/assignment?id=<?= $assignment->id ?>" class="btn btn-primary">View Assignment</a>
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
