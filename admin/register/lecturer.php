
<?php 
  include '../../element/header.php';

  include '../../element/sidebar.php';
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
                    <input type="text" class="form-control" name="semester" id="" placeholder="Enter Semester">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="savesemester" class="btn btn-primary">Save Semester</button>
                </div>
              </form>

            </div>

            

        </div>
    </section>
</div>
  
  
  <?php 
    include '../../element/footer.php';
  ?>
