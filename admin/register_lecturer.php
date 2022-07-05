
<?php 
  include '../element/header.php';

  if($user->status !== 'admin') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }
  
  include '../element/sidebar.php';

?>

<div class="content-wrapper">
    <section class="content register-page">
        <div class="container-fluid register-box">
            <!-- general form elements -->
            <div class="card card-primary my-5 p-4">
        <h4 class="">Registration of Lecturer</h4>
              <!-- <div class="card-header">
                <h3 class="card-title">Register Lecturer</h3>
              </div> -->
                        
                <?php 
                    echo SuccessMessage();
                    echo ErrorMessage();
                ?>

                <form class="mt-3" action="admin/validation/register_valid.php" method="POST">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="fullname" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="phone" placeholder="Phone Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <select name="gender" id="gender" class="custom-select">
                            <option value="">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <select name="course" id="lect_dept_reg" class="custom-select">
                            <option value="">Course</option>
                            <?php 
                                $courses = $getFromU->select_all_val_table('course');
                                foreach($courses as $course): 
                            ?>
                                <option value="<?= $course->id ?>"><?= $course->course ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="departm" class="form-control lect_reg_dept" value="">

                    <label class="ml-2" for="">Date of Birth</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="dob">
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                        </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" name="register_lect" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>

            </div>

            

        </div>
    </section>
</div>
  
  
  <?php 
    include '../element/footer.php';
  ?>
