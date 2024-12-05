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

<body>

    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>
                <h3 class="h3 fw-bold">Dashboard</h3>
                <hr class="hr">
            </header>
            <div class="container-fluid">
                <div id="dcon" class="row">
                    <div class="col mb-3 mx-1">
                        <a href="../user/manage users.php?user=student">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Students</h5></button>
                        </a>
                    </div>
                    <div class="col mb-3 mx-1">
                        <a href="../user/manage users.php?user=coordinator">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Coordinators</h5></button>
                        </a>
                    </div>
                    <div class="col mb-3 mx-1">
                        <a href="../user/create user.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Create User</h5></button>
                        </a>
                    </div>
                </div>
                <div id="dcon" class="row">
                    <div class="col mb-3 mx-1">
                        <a href="../subject/subjects.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Subjects</h5></button>
                        </a>
                    </div>
                    <div class="col mb-3 mx-1">
                        <a href="../subject/subject allocation.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Subject Allocation</h5></button>
                        </a>
                    </div>
                    <div class="col mb-3 mx-1">
                        <a href="../subject/create subject.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Create Subject</h5></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        if(screen.width<600){
            document.querySelectorAll("#dcon").forEach((event)=>{
                event.classList.remove("row");
            })
        }
    </script>
</body>

</html>