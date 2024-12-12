<?php include "../sidebar/sidebar crd.php";?>
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
                        <a href="../coordinator/notice.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Notice</h5></button>
                        </a>
                    </div>
                    <div class="col mb-3 mx-1">
                        <a href="../coordinator/create notice.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Post Notice</h5></button>
                        </a>
                    </div>
                    <div class="col mb-3 mx-1">
                        <a href="../coordinator/academics.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Academics</h5></button>
                        </a>
                    </div>
                    <div class="col mb-3 mx-1">
                        <a href="../coordinator/attendance.php">
                            <button class="w-100 p-3 btn btn-dark fw-bold"><h5>Attendance</h5></button>
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