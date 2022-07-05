
<?php 
  include '../element/header.php';

  if($user->status !== 'lecturer') {
    echo '<script>window.location.replace("'.BASE_URL.'validation/logout");</script>';
  }
  
  include '../element/sidebar.php';

  @$get_assignment = $_GET['id'];

  if(isset($_GET['id'])) {
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                <?php 
                    $assignment = $getFromU->select_all_one_cond('questions', 'id', $get_assignment);
                    foreach($assignment as $assign):
                ?>
                    <div class="card card-info">

                        <div class="card-header">
                            <h3 class="card-title">Question</h3>
                        </div>
                        
                        <div class="card-body">
                            <?php 
                                echo nl2br(htmlspecialchars_decode(stripslashes($assign->question)));
                            ?>
                        </div>

                    </div>

                    <div class="card card-info">

                        <div class="card-header">
                            <h3 class="card-title">Answer</h3>
                        </div>
                        
                        <div class="card-body">
                            <?php 
                                echo nl2br(htmlspecialchars_decode(stripslashes($assign->answer)));
                            ?>
                        </div>

                    </div>

                    <?php 
                        endforeach;
                    ?>

                </div>

            </div>
        </div>
    </section>
    <!-- /.end main content -->

</div>
  
  
  <?php 

    } else {
        echo '<script>window.location.href="'.BASE_URL.'lecturer/view_assignments"</script>';
    }

    include '../element/footer.php';
  ?>
