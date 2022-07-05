
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
            <h3 class="card-title center">Students in Institution</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="admin/validation/promote_valid.php" method="POST">
                
                <?php 
                    echo SuccessMessage();
                    echo ErrorMessage();
                ?>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th><input type="checkbox" id="checkAll" checked>&nbsp;&nbsp;Check All</th>
                        <th>Fullname</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $students = $getFromU->fetch_innerjoin_two_cond('user', 'department', 'status', 'student', 'approve', 1);
                        $i = 0;
                        foreach($students as $student): 
                            $i++;
                    ?>

                    <tr>
                        <td><?= $i; ?></td>
                        <td><center>
                            <input class="center" name="check[]" type="checkbox" value="<?=$student->id;?>" checked>
                            <input type="hidden" name="semester_<?= $student->id; ?>" value="<?= $student->semester; ?>">
                        </center></td>
                        <td><?= $student->fullname ?></td>
                        <td><?= $student->phone_no ?> </td>
                        <td><?= $student->email ?></td>
                        <td><?= $student->department ?></td>
                        <td> <?= $student->gender ?></td>
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
                        <th>Course</th>
                        <th>Gender</th>
                    </tr>
                    </tfoot>
                </table>
                <center>
                    <button type="submit" name="promote_student" class="btn btn-info">Promote</button>
                </center>
            </form>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
  
  
  <?php 
    include '../element/footer.php';
  ?>
