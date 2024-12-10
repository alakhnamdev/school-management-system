<?php include "../sidebar/sidebar.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>
                <h3 class="h3 fw-bold">Users</h3>
                <hr class="hr">
            </header>
            <div class="d-flex">                
                <div class="mb-3">
                    <button class="btn border-0"><a class="btn btn-dark shadow-none text-decoration-none text-light p-3" href="./manage users.php?user=coordinator">Coordinators</a></button>
                </div>
                <div class="mb-3">
                    <button class="btn border-0"><a class="btn btn-dark shadow-none text-decoration-none text-light p-3" href="./manage users.php?user=student">Students</a></button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>