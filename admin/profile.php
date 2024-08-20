<?php include("layouts/head.php"); ?>
<div class="wrapper ">
    <?php include("layouts/sidebar.php"); ?>
    <div class="main-panel">
        <!-- Navbar -->
        <?php include("layouts/navbar.php"); ?>
        <!-- End Navbar -->


        <style>
            .user-profile {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f8f9fa;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .profile-picture {
                float: left;
                width: 150px;
                height: 150px;
                border-radius: 50%;
                overflow: hidden;
                margin-right: 20px;
                border: 2px solid #007bff;
                /* Add a blue border around the profile picture */
            }

            .profile-picture img {
                width: 100%;
                height: auto;
            }

            .profile-placeholder {
                font-size: 60px;
                text-align: center;
                line-height: 150px;
                /* Vertically center the icon */
            }

            .user-info {
                overflow: hidden;
            }

            .user-info h2 {
                font-size: 24px;
                margin-top: 0;
            }

            .user-info p {
                margin-bottom: 10px;
            }

            .social-icons {
                margin-top: 20px;
            }

            .social-icons a {
                font-size: 24px;
                margin-right: 15px;
                color: #007bff;
                /* Bootstrap primary color */
            }
        </style>

        <?php
        // session_start();
        // if (!isset($_SESSION["userRoleId"])) {
        //     header('location: ../login/form.php');
        //     exit();
        // }
        
        $name = $_SESSION['userFullname'];
        $email = $_SESSION['userEmail'];
        $adddr = $_SESSION['userAddress'];
        $contact = $_SESSION['userContact'];
        $b_day = $_SESSION['userDOB'];
        $profile = $_SESSION['userProfile'];
        $fName = $_SESSION['fName'];
        $formattedDOB = date('F j, Y', strtotime($b_day));








        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="user-profile">
                        <div class="profile-picture">
                            <!-- Default image icon using Font Awesome -->
                            <!-- <i class="fas fa-user-circle profile-placeholder mx-auto d-block"></i> -->
                            <!-- Replace with actual profile picture if available -->
                            <img src="../assets/images/users/<?php echo $fName . "/" . $profile ?>"
                                alt="Profile Picture">
                        </div>
                        <div class="user-info">
                            <h2>
                                <?php echo $name ?>
                            </h2>
                            <p>Email:
                                <?php echo $email ?>
                            </p>
                            <p>Address:
                                <?php echo $adddr ?>
                            </p>
                            <p>Contact:
                                <?php echo $contact ?>
                            </p>
                            <p>birthday:
                                <?php echo $formattedDOB; ?>
                            </p>
                        </div>
                        <!-- <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        Add more social media icons and links as needed
                    </div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>