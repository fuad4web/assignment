
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
            <center>
                <h3 class="card-title center">Approval of Students</h3>
            </center>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">

            <?php 
                echo SuccessMessage();
                echo ErrorMessage();
            ?>

            <thead>
            <tr>
                <th>Fullname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Course</th>
                <th>Gender</th>
                <th>Approve</th>
            </tr>
            </thead>
            <tbody>

            <?php 
                $students = $getFromU->fetch_innerjoin_two_cond('user', 'department', 'status', 'student', 'approve', 0);
                foreach($students as $student): 
            ?>

                <tr>
                    <td><?= $student->fullname ?></td>
                    <td><?= $student->phone_no ?> </td>
                    <td><?= $student->email ?></td>
                    <td><?= $student->department ?></td>
                    <td> <?= $student->gender ?></td>
                    <form method="POST" action="admin/validation/stud_approve_val.php">
                        <td>
                            <input type="hidden" name="student_id" value="<?= $student->id ?>">
                            <button type="submit" name="approve_student" onclick="return confirm('Approve this account?');" class="btn btn-info btn-block">Approve</button>
                        </td>
                    </form>
                </tr>
            </form>

            <?php 
                endforeach;
            ?>
            
            </tbody>
            <tfoot>
            <tr>
                <th>Fullname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Course</th>
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
