
<?php 
  include '../element/header.php';

  if($user->status !== 'lecturer') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }

  $dept = $getFromU->select_one_val('department', 'department', 'id', $user->department);
  
  include '../element/sidebar.php';

  
    if(isset($_POST['update_profile'])) {
        if(isset($_FILES['image'])) {
            if(!empty($_FILES['image']['name'][0])) {
                $fileRoot = $getFromU->uploadImage($_FILES['image']);
                $upda = $getFromU->update('user', $user_id, array('profile_pic' => $fileRoot));
                if($upda == true) {
                    $_SESSION['SuccessMessage'] = "Profile Picture Successfully Updated";
                    echo '<script>window.location.href="lecturer/profile"</script>';
                } else {
                    $_SESSION['ErrorMessage'] = "Profile Picture unable to Update";
                    echo '<script>window.location.href="lecturer/profile"</script>';
                }
            }
        }
    }

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php 
         echo SuccessMessage();
         echo ErrorMessage();
    ?>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row g-5">

                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="profileImage/<?= $user->profile_pic ?>"
                                alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user->fullname ?></h3>

                            <p class="text-muted text-center"><?= $user->status ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Gender</b> <a class="float-right"><?= $user->gender ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Department</b> <a class="float-right"><?= $dept->department ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone Number</b> <a class="float-right"><?= $user->phone_no ?></a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-info p-4" id="settings">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Fullname</label>
                            <div class="col-sm-10">
                            <input type="text" value="<?= $user->fullname ?>" class="form-control" id="inputName" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" value="<?= $user->email ?>" class="form-control" id="inputEmail" placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                            <input type="text" value="<?= $user->phone_no ?>" class="form-control" id="inputName2" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                            <input type="text" value="<?= $dept->department ?>" class="form-control" id="inputName2" placeholder="Name" readonly>
                            </div>
                        </div>
                        <form class="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Profile Picture</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" name="update_profile" class="btn btn-outline-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>

<?php 
  include '../element/footer.php';
?>
