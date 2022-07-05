
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/adminlteLogo.png" alt="Assignment Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Assignment</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            if($user->profile_pic == 0 || $user->profile_pic == NULL) {
          ?>
            <img src="dist/img/deafultpics.jpg" alt="<?= $user->fullname ?> Image" class="img-circle elevation-2">
          <?php 
            } else {
          ?>
            <img src="profileImage/<?= $user->profile_pic ?>" alt="<?= $user->fullname ?> Image" class="img-circle elevation-2">
          <?php 
            }
          ?>

        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user->fullname ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <?php 
          if($user->status == 'admin') {
        ?>
          <li class="nav-item">
            <a href="./admin/dashboard" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Institution
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./admin/lecturers" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lecturers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./admin/students" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Creation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./admin/faculty" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculties</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./admin/department" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Departments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./admin/semester" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semesters</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./admin/course" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
              <p>
                Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./admin/register_lecturer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lecturer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./admin/register_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="./admin/student_approve" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
              <p>
                Students Approval
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./admin/promotion" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Promotion</p>
            </a>
          </li>

          <?php } elseif($user->status == 'lecturer') { ?>
            
          <li class="nav-item">
            <a href="./lecturer/dashboard" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="./lecturer/assign_assignment" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Assignment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./lecturer/assign_assignment" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Assign Assignment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./lecturer/view_assignments" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Assignments</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="./lecturer/pending_assignment" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Pending Assignment(s)</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./lecturer/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Profile Page</p>
            </a>
          </li>

          <?php } else {?>
            
          <li class="nav-item">
            <a href="./student/dashboard" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="./student/assignments" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                My Assignment(s)
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./student/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Profile Page</p>
            </a>
          </li>

          <?php } ?>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
