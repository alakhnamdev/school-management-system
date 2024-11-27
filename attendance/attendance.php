<?php
include '../connection/connector.php';
function viewBySubjects($con)
{
    $subjects = mysqli_fetch_all(mysqli_query($con, "SELECT `subject id`,`subject name` FROM `subject`"), MYSQLI_ASSOC);
    foreach ($subjects as $sub) {
        $subId = $sub['subject id'];
        $subName = $sub['subject name'];
        ?>
        <a href="subject.php?subjectId=<?php echo urlencode($subId) ?>"
            class="text-decoration-none bg-light border border-3 border-dark rounded-3">
            <button class="btn text-dark px-5 py-3">
                <div class="h3 fw-bold"><?php echo htmlspecialchars($subName) ?></div>
            </button>
        </a>
        <?php
    }
}
function viewByClass($con)
{
    $classes = mysqli_fetch_all(mysqli_query($con, "SELECT `class` FROM `class and subjects` ORDER BY `id`"), MYSQLI_ASSOC);
    foreach ($classes as $clas) {
        $clas = $clas['class'];
        ?>
        <a href="subject.php?subjectId=<?php echo urlencode($clas) ?>"
            class="text-decoration-none bg-light border border-3 border-dark rounded-3">
            <button class="btn text-dark px-5 py-3">
                <div class="h3 fw-bold"><?php echo htmlspecialchars($clas) ?></div>
            </button>
        </a>
        <?php
    }
}
if ($_GET['view'] == "subject") {
    ?>
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
                    <h1 class="h1 fw-bold">View By Subjects</h1>
                    <hr class="hr">
                </header>
                <div class="d-flex gap-3 flex-wrap">
                    <?php viewBySubjects($con) ?>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
} else if ($_GET['view'] == "class") {
    ?>
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
                    <h1 class="h1 fw-bold">View By Class</h1>
                    <hr class="hr">
                </header>
                <div class="d-flex gap-3 flex-wrap">
                    <?php viewByClass($con) ?>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    ?>
        <script>
            alert("Invalid Entry!");
            window.open("./", "_self");
        </script>
    <?php
}
?>