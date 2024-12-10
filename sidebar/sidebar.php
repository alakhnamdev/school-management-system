<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>window.open('../index.php','_self')</script>";
}
else if($_SESSION['username']=="admin"){
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
            <div id="sidebar" class="position-fixed top-0 vh-100 bg-white p-3 overflow-hidden z-1">
                <div>
                    <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 mb-2 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" onclick="openPage('../dashboard/index.php')">
                        Dashboard
                    </button>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- Sidebar Element -->             
                    <div class="accordion-item mb-2 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Users
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse rounded-3" data-bs-parent="#accordionFlushExample">
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../user/create user.php')">Create User</btn>
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../user/user.php')">Manage Users</btn>
                        </div>
                    </div>
                    <!-- Sidebar Element -->

                    <!-- Sidebar Element -->             
                    <div class="accordion-item mb-2 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Academics
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse rounded-3" data-bs-parent="#accordionFlushExample">
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../academics/index.php')">View Academics</btn>
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../')">Update Academics</btn>
                        </div>
                    </div>
                    <!-- Sidebar Element -->

                    <!-- Sidebar Element -->             
                    <div class="accordion-item mb-2 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Attendance
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse rounded-3" data-bs-parent="#accordionFlushExample">
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../attendance/index.php')">View Attendance</btn>
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../')">Update Attendance</btn>
                        </div>
                    </div>
                    <!-- Sidebar Element -->


                    <!-- Sidebar Element -->             
                    <div class="accordion-item mb-2 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Subject
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse rounded-3" data-bs-parent="#accordionFlushExample">
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../subject/create subject.php')">Create Subject</btn>
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../subject/subjects.php')">Manage Subject</btn>
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../subject/subject allocation.php')">Subject Allocation</btn>
                        </div>
                    </div>
                    <!-- Sidebar Element -->

                    <!-- Sidebar Element -->             
                    <div class="accordion-item mb-2 rounded-3 border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed shadow-none p-1 rounded-3 bg-light text-secondary p-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Notice
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse rounded-3" data-bs-parent="#accordionFlushExample">
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../notice/')">Notice Board</btn>
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../notice/create notice.php')">Create Notice</btn>
                        <btn class="accordion-body btn bg-light fw-bold text-secondary p-2 mt-2" onclick="openPage('../notice/')">Manage Notice</btn>
                        </div>
                    </div>
                    <!-- Sidebar Element -->
                </div>
            </div>
            <script>
                let sidebar = document.getElementById("sidebar");
                sidebar.style.width = "250px";
                sidebar.style.transform = "translateX(-250px)";
                if(screen.width>600){
                    sidebar.style.transform = "translateX(0px)";
                    document.body.style.marginLeft = "250px";
                }
                sidebar.style.transition = "all 0.25s ease";
                let action = (event) => {
                    sidebar.style.transform = sidebar.style.transform == "translateX(-250px)" ? "translateX(0px)" : "translateX(-250px)";
                    if(screen.width>600){
                        document.body.style.marginLeft = document.body.style.marginLeft=="250px" ? "0px" : "250px";
                    }
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