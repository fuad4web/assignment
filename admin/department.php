
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
                <h3 class="card-title">Create Department</h3>
              </div>
                        
                <?php 
                    echo SuccessMessage();
                    echo ErrorMessage();
                ?>

              <form role="form" method="POST" action="admin/validation/dept_valid.php">
                <div class="card-body">

                    <div class="form-group">
                        <label>Select Faculty</label>
                        <select class="custom-select" name="faculty_value">
                            <option>Choose Faculty</option>
                            <?php 
                                $faculties = $getFromU->select_all_val_table('faculty');
                                foreach($faculties as $faculty):
                            ?>

                            <option value="<?= $faculty->id ?>"><?= $faculty->faculty ?></option>

                            <?php 
                                endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" class="form-control" name="dept_name" id="" placeholder="Enter Department Name">
                    </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="savedept" class="btn btn-primary">Save Department</button>
                </div>
              </form>

            </div>

            <div class="col-md-8 mx-auto mb-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title center">List of all Departments in Institution</h3>

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
                        <th>Department</th>
                        <th>Faculty</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $departments = $getFromU->fetch_innerjoin('department', 'faculty', 'faculty_id', 'faculty_id');
                        $i = 0;
                        foreach($departments as $department):
                          $i++;
                      ?>

                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $department->department ?></td>
                        <td><?= $department->faculty ?></td>
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
