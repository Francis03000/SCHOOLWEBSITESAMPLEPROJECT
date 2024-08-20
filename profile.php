<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>

<?php

$name = $_SESSION['userFullname'];
$lrn = $_SESSION['studentLRN'];
$grades = $_SESSION['studentGrades'];
$sec = $_SESSION['studentSec'];
$email = $_SESSION['studentEmail'];
$std_id = $_SESSION['studentId'];













?>

<style>

</style>

<!-- Home -->

<br><br>

<?php include("layoutsWebsite/footer.php"); ?>
<script>
    /* To Disable Inspect Element */
    $(document).bind("contextmenu", function (e) {
        e.preventDefault();
    });

    $(document).keydown(function (e) {
        if (e.which === 123) {
            return false;
        }
    });
    document.onkeydown = (e) => {

        if (e.key == 123) {

            e.preventDefault();

        }

        if (e.ctrlKey && e.shiftKey && e.key == 'I') {

            e.preventDefault();

        }

        if (e.ctrlKey && e.shiftKey && e.key == 'C') {

            e.preventDefault();

        }

        if (e.ctrlKey && e.shiftKey && e.key == 'j') {

            e.preventDefault();

        }

        if (e.ctrlKey && e.key == 'U') {

            e.preventDefault();
        }
    };
</script>