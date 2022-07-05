
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
                <h3 class="card-title">Create Faculty</h3>
              </div>
              
                <?php 
                    echo SuccessMessage();
                    echo ErrorMessage();
                ?>

              <form role="form" method="POST" action="admin/validation/faculty_valid.php">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Faculty Name</label>
                    <input type="text" class="form-control" name="faculty_name" id="" placeholder="Enter Faculty Name">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="savefaculty" class="btn btn-primary">Save Faculty</button>
                </div>
              </form>

            </div>

            <div class="col-md-6 mx-auto mb-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title center">List of all Faculties in Institution</h3>

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
                        <th>Faculty Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $faculties = $getFromU->select_all_val_table('faculty');
                        $i = 0;
                        foreach($faculties as $faculty):
                          $i++;
                      ?>

                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $faculty->faculty ?></td>
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
