<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 56px;
        }

        #sup_container {
            margin-top: 20px;
        }

        .subpage {
            display: none;
        }

        .back-btn {
            margin-top: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Show subpage on grade level and section click
            $('.grade-section').click(function () {
                var targetPage = $(this).data('target');
                $('.subpage').hide();
                $('#' + targetPage).show();
            });

            // Go back to the main page
            $('.back-btn').click(function () {
                $('.subpage').hide();
            });
        });
    </script>
</head>

<body>

    <div class="container">
        <div class="col" id="sup_container">
            <h2 class="text-center" id="jhs">Junior High School</h2>

            <!-- Grade Level and Section Links -->
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action grade-section" data-target="grade8A">Grade
                    8A</a>
                <a href="#" class="list-group-item list-group-item-action grade-section" data-target="grade8B">Grade
                    8B</a>
                <!-- Add more grade levels and sections as needed -->
            </div>

            <!-- Grade 8A Subpage -->
            <div class="row subpage" id="grade8A">
                <!-- Content for Grade 8A -->
                <h3>Grade 8A Information</h3>
                <p>This is the content for Grade 8A.</p>
                <button class="btn btn-secondary back-btn">Back</button>
            </div>

            <!-- Grade 8B Subpage -->
            <div class="row subpage" id="grade8B">
                <!-- Content for Grade 8B -->
                <h3>Grade 8B Information</h3>
                <p>This is the content for Grade 8B.</p>
                <button class="btn btn-secondary back-btn">Back</button>
            </div>

            <!-- Add more subpages as needed -->

            <!-- Container 2 -->
            <div class="row mt-3" id="container_2">
                <!-- Content for Container 2 -->
            </div>
        </div>
    </div>

</body>

</html>