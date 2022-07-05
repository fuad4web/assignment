
<?php 
  include '../element/header.php';

  if($user->status !== 'admin') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }
  
  include '../element/sidebar.php';

?>

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lecturers in Institution</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Fullname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Course</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>

            <?php 
                $lecturers = $getFromU->fetch_innerjoin_one_cond('user', 'department', 'status', 'lecturer');
                foreach($lecturers as $lecturer): 
            ?>

            <tr>
                <td><?= $lecturer->fullname ?></td>
                <td><?= $lecturer->phone_no ?> </td>
                <td><?= $lecturer->email ?></td>
                <td><?= $lecturer->department ?></td>
                <td> <?= $lecturer->gender ?></td>
            </tr>

            <?php 
                endforeach;
            ?>
            
            </tbody>
            <tfoot>
            <tr>
                <th>Fullname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
            </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
  
  
  <?php 
    include '../element/footer.php';
  ?>
