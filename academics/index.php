<?php include "../sidebar/sidebar.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<style>
    * {
        font-family: poppins;
    }
</style>

<body>

    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>    
                <h3 class="h3 fw-bold">Academics</h3>
                <hr class="hr">
            </header>
            <div class="d-flex gap-3">
                <a href="marks.php?view=subject" class="text-decoration-none bg-dark rounded-3">
                    <button class="btn text-light p-3">By Subject</button>
                </a>
                <a href="marks.php?view=class"class="text-decoration-none bg-dark rounded-3">
                    <button class="btn text-light p-3">By Class</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>