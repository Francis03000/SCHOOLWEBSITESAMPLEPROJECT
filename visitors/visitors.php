

<!DOCTYPE html>
<html>

<head>
    <title>Visitor Counter Card</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .card {
            margin-top: 50px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
        }

        .counter {
            font-size: 48px;
            color: #343a40;
        }

        .label {
            font-size: 18px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 0;
        }

        @media (max-width: 576px) {
            .card {
                margin-top: 20px;
            }

            .counter {
                font-size: 36px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1 class="mb-4">Welcome to my website!</h1>
            <div class="counter"><?php echo getVisitorCount(); ?></div>
            <p class="label">Visitor Count</p>
        </div>
    </div>
</body>

</html>
