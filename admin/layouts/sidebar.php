<?php

$permi = $_SESSION['userRoleId'];

?>

<div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
  <div class="logo" style="background-color: white;">
    <a href="../index.php" class="simple-text logo-normal" style="font-family:arial; font-weight: 900; color: maroon;">
      <img class="rounded-circle" style="width: 80px; position: relative; left: -10px; top: -5px;"
        src="../assets/images/RCNHSLOGO.jpg">

      RCNHS
    </a>
  </div>
  <div class="sidebar-wrapper" style="background-color: white;">
    <ul class="nav">


      <?php if ($permi != 18 && $permi != -1) { ?>

        <!-- <li class="nav-item" id="pindutanAdmin1" data-id="1">
            <a class="nav-link" href="index.php" style="background-color: maroon; color:white;">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li> -->
        <!-- <li class="nav-item" id="pindutanAdmin1" data-id="1">
        <a class="nav-link" href="permissions.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
          <i class="material-icons" style="color: black;">lock</i>
          <p>Permissions</p>
        </a>
      </li> -->
        <li class="nav-item " id="pindutanAdmin1" data-id="1">
          <a class="nav-link" href="users.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">person</i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin2" data-id="2">
          <a class="nav-link" href="teachers.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">groups</i>
            <p>Teachers</p>
          </a>
        <li class="nav-item " id="pindutanAdmin3" data-id="3">
          <a class="nav-link" href="teacher_position.php"
            style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">groups</i>
            <p>Teachers Position</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin4" data-id="4">
          <a class="nav-link" href="schoolyears.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">library_books</i>
            <p>School Year</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin5" data-id="5">
          <a class="nav-link" href="departments.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">bubble_chart</i>
            <p>Departments</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin6" data-id="6">
          <a class="nav-link" href="strands.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">bubble_chart</i>
            <p>Strands</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin7" data-id="7">
          <a class="nav-link" href="advisory.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">bubble_chart</i>
            <p>Advisory</p>
          </a>
        </li>
        <!-- <li class="nav-item " id="pindutanAdmin8" data-id="8">
          <a class="nav-link" href="office.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">business</i>
            <p>Offices</p>
          </a>
        </li> -->
        <li class="nav-item " id="pindutanAdmin8" data-id="8">
          <a class="nav-link" href="categories.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">category</i>
            <p>Categories</p>
          </a>
        </li>
        <!-- <li class="nav-item " id="pindutanAdmin10" data-id="10">
        <a class="nav-link" href="blog.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
          <i class="material-icons" style="color: black;">location_ons</i>
          <p>Blog</p>
        </a>
      </li> -->


        <?php
      }
      ?>

      <?php if (($permi != 18 || $permi == 18) && $permi != -1) { ?>
        <li class="nav-item " id="pindutanAdmin9" data-id="9">
          <a class="nav-link" href="galleries.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">collections</i>
            <p>Gallery</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin10" data-id="10">
          <a class="nav-link" href="announcement.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">campaign</i>
            <p>Announcements</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin11" data-id="11">
          <a class="nav-link" href="news.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">campaign</i>
            <p>News</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin12" data-id="12">
          <a class="nav-link" href="student.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">campaign</i>
            <p>Student</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin13" data-id="13">
          <a class="nav-link" href="students_grades.php"
            style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">campaign</i>
            <p>Report Cards</p>
          </a>
        </li>

        <?php
      }



      ?>

      <?php if ($permi != 18 && $permi != -1) { ?>



        <li class="nav-item " id="pindutanAdmin14" data-id="14">
          <a class="nav-link" href="about-us.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">info</i>
            <p>About-Us</p>
          </a>
        </li>
        <?php
      }



      ?>

      <?php if ($permi == -1) { ?>



        <li class="nav-item " id="pindutanAdmin12" data-id="12">
          <a class="nav-link" href="student.php" style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">campaign</i>
            <p>Student</p>
          </a>
        </li>
        <li class="nav-item " id="pindutanAdmin13" data-id="13">
          <a class="nav-link" href="students_grades.php"
            style="background-color: #EEEDED; color:black; font-weight: 600;">
            <i class="material-icons" style="color: black;">campaign</i>
            <p>Report Cards</p>
          </a>
        </li>
        <?php
      }



      ?>

    </ul>
  </div>
</div>