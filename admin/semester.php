
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
                <h3 class="card-title">Create Semester</h3>
              </div>
                        
                <?php 
                    echo SuccessMessage();
                    echo ErrorMessage();
                ?>

              <form role="form" method="POST" action="admin/validation/semester_valid.php">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Semester</label>
                    <input type="text" class="form-control admin_semester" name="semester" id="" placeholder="First Year">
                    <br>
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control admin_semester_slug" placeholder="first-year" name="semester_slug" id="" readonly>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="savesemester" class="btn btn-primary">Save Semester</button>
                </div>
              </form>

            </div>

            
            <div class="col-md-6 mx-auto mb-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title center">List of Semesters</h3>

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
                        <th>Semester</th>
                        <th>Semester Slug</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $semesters = $getFromU->select_all_val_table('semester');
                        $i = 0;
                        foreach($semesters as $semester):
                          $i++;
                      ?>

                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $semester->semester ?></td>
                        <td><?= $semester->slug ?></td>
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
