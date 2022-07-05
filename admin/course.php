
<?php 
  include '../element/header.php';

  if($user->status !== 'admin') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }
  
  include '../element/sidebar.php';

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary my-5">
              <div class="card-header">
                <h3 class="card-title">Create Courses</h3>
              </div>
                        
                <?php 
                    echo SuccessMessage();
                    echo ErrorMessage();
                ?>

              <form role="form" method="POST" action="admin/validation/course_valid.php">
                <div class="card-body">

                    <div class="form-group">
                        <label>Select Department</label>
                        <select class="custom-select" name="dept_value">
                            <option>Choose Department</option>
                            <?php 
                                $departments = $getFromU->select_all_val_table('department');
                                foreach($departments as $department):
                            ?>

                            <option value="<?= $department->id ?>"><?= $department->department ?></option>

                            <?php 
                                endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Name</label>
                        <input type="text" class="form-control" name="course_name" id="" placeholder="Enter Course Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Title</label>
                        <input type="text" class="form-control" name="course_title" id="" placeholder="Enter Course Title">
                    </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="savecourse" class="btn btn-primary">Save Course</button>
                </div>
              </form>

            </div>

            <div class="col-md-8 mx-auto mb-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title center">List of all Courses in Institution</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div> -->
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Course</th>
                        <th>Department</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $courses = $getFromU->fetch_innerjoin('course', 'department', 'dept_id', 'dept_id');
                        $i = 0;
                        foreach($courses as $course):
                          $i++;
                      ?>

                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $course->course ?></td>
                        <td><?= $course->department ?></td>
                      </tr>

                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

        </div>
    </section>
</div>
  
  
  <?php 
    include '../element/footer.php';
  ?>
