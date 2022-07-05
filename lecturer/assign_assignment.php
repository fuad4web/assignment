
<?php 
  include '../element/header.php';

  if($user->status !== 'lecturer') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }
  
  include '../element/sidebar.php';
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Creating of Assignment</h3>
                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                <i class="fas fa-times"></i></button>
                            </div>

                            <?php 
                                echo SuccessMessage();
                                echo ErrorMessage();
                            ?>

                        </div>
                        
                        <form action="lecturer/validation/assign_valid.php" class="my-5" method="POST">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="level" class="form-control" id="">
                                            <option value="">Level</option>
                                            <?php
                                                $levels = $getFromU->select_all_val_table('semester');
                                                foreach($levels as $level):
                                            ?>
                                                <option value="<?=$level->id?>"><?=$level->semester?></option>
                                            <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="dept" class="form-control" id="">
                                            <option value="">Department</option>
                                            <?php
                                                $depts = $getFromU->select_all_val_table('department');
                                                foreach($depts as $dept):
                                            ?>
                                                <option value="<?=$dept->id?>"><?=$dept->department?></option>
                                            <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pad">

                                <input type="hidden" value="<?= $user->course; ?>" name="course_id">
                                <div class="mb-3">
                                    <h2>Question</h2>
                                    <textarea class="textarea" id="textEditor" placeholder="Type Out Your Question(s) here....."
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="assign_question" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <h2>Answer</h2>
                                    <textarea class="textarea" id="textEditor" placeholder="Type your Answer(s) here...."
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="assign_answer" required></textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <center>
                                    <button type="submit" name="save_question" class="btn btn-danger mx-auto">Assign Assignment</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.end main content -->

</div>
  
  
  <?php 
    include '../element/footer.php';
  ?>
