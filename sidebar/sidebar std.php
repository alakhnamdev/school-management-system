<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>window.open('../index.php','_self')</script>";
}
else if(str_contains($_SESSION['username'],"STD")){
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
            <link rel="stylesheet" href="../assets/css/style.css">
            <link rel="stylesheet" href="../assets/css/sidebar.css">
        </head>

        <body class="bg-light">
            <nav>
                <div id="navbar" class="container-fluid bg-white text-center w-100 position-fixed top-0 left-0 z-1 d-flex justify-content-center align-items-center">
                    <button class="btn btn-dark mb-3 text-start border-0 shadow-none rounded-3 bg-light text-secondary fw-semibold" style="position: absolute; left: 10px; top: 20px;" onclick="action(this)"><img src="../assets/svg/menu.svg" style="filter: invert(1); height: 30px;" class="opacity-75" alt="menu"></button>
                    <h1 class="playfair text-secondary display-4 fw-bold mt-1 text-dark">School ERP</h1>
                    <button class="btn btn-dark mb-3 text-start border-0 shadow-none rounded-3 bg-light text-secondary fw-semibold" style="position: absolute; right: 10px; top: 20px;" onclick="openPage('../logout')"><img src="../assets/svg/logout.svg" style="filter: invert(1); height: 30px;" class="opacity-75" alt="menu"></button>
                </div>
            </nav>
            <div id="sidebar" class="position-fixed top-0 vh-100 bg-white p-3 overflow-hidden">
                <div>
                    <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 mb-2 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" onclick="openPage('../student/')">
                        Dashboard
                    </button>
                </div>
                <div>
                    <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 mb-2 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" onclick="openPage('../student/notice.php')">
                        Notice
                    </button>
                </div>
                <div>
                    <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 mb-2 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" onclick="openPage('../student/academics.php')">
                        Academics
                    </button>
                </div>
                <div>
                    <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 mb-2 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" onclick="openPage('../student/attendance.php')">
                        Attendance
                    </button>
                </div>
            </div>
            <script>
                let sidebar = document.getElementById("sidebar");
                sidebar.style.width = "250px";
                document.body.style.marginLeft = "250px";
                sidebar.style.transition = "all 0.25s ease";
                let action = (event) => {
                    sidebar.style.transform = sidebar.style.transform == "translateX(-250px)" ? "translateX(0px)" : "translateX(-250px)";
                    document.body.style.marginLeft = document.body.style.marginLeft=="250px" ? "0px" : "250px";
                }
                let openPage = link => {
                    window.open(link,"_self");
                }
            </script>
        </body>

        </html>
    <?php
}
else{
    echo "<script>window.open('../index.php','_self')</script>";
}
?>