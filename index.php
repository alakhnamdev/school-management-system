<?php
include "./connection/connector.php";
function verify($con, $username, $password)
{
    $checkUserQuery = "SELECT * FROM `credential` WHERE `username` = '$username'";
    $checkUser = mysqli_query($con, $checkUserQuery);
    if ($checkUser) {
        $user = mysqli_fetch_assoc($checkUser);
        $verified = password_verify($password, $user['password']);
        if ($verified) {
            session_start();
            $_SESSION['username'] = $username;
            if($username=="admin"){            
                ?>
                <script>
                    alert("Welcome Admin");
                    window.open("dashboard", "_self");
                </script>
                <?php
            }
            else{
                $openUser = str_contains($_SESSION['username'],"CRD") ? "coordinator" : "student";
                ?>
                <script>
                    alert("Welcome <?php echo $openUser?>");
                    window.open("<?php echo $openUser?>", "_self");
                </script>
                <?php
            }
        } else {
            echo '<script>alert("Wrong Password")</script>';
        }
    } else {
        echo '<script>alert("No User Found!")</script>';
    }
}
session_start();
if(!$_SESSION['username']){
    if (isset($_POST['submit'])) {
        verify($con, $_POST['username'], $_POST['password']);
    }
}
else{
    $username = $_SESSION['username'];
    if($username=="admin"){            
        ?>
        <script>
            window.open("dashboard", "_self");
        </script>
        <?php
    }
    else{
        $openUser = str_contains($_SESSION['username'],"CRD") ? "coordinator" : "student";
        ?>
        <script>
            window.open("<?php echo $openUser?>", "_self");
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet" />
</head>

<style>
    * {
        font-family: poppins;
    }

    body {
        background-color: #f8f9fb;
    }

    h1{
        font-size: 3em;
    }

    #logo img {
        height: 100px;
        margin-top:-400px;
        border-radius: 100%;
    }

    #login{
        height: 25em;
        width: 21em;
        padding: 2em;
    }

    .box-shadow {
        box-shadow: 0 2px 30px rgba(0, 0, 0, 0.1);
    }

    #visibility {
        filter: invert(1);
        opacity: 75%;
    }
</style>

<body>
    <div class="position-absolute vh-100 vw-100 opacity-25" style="background:url('assets/images/school doodle.jpg');background-size: cover;"></div>
    <div id="logo" class="position-absolute top-50 start-50 translate-middle z-1"><img src="assets/images/favicon.png" class="shadow-sm" alt="logo"></div>
    <div class="d-flex flex-column justify-content-center vh-100 vw-100 align-items-center position-absolute">
        <div id="login"
            class="d-flex justify-content-center align-items-center flex-column bg-white rounded-5 box-shadow">
            <h1 class="mb-4 fw-bold text-dark" style="font-family:playfair display;font-size:2em:">School ERP</h1>
            <form action="<?php echo htmlspecialchars("index.php") ?>" method="post" class="w-100">
                <div class="form-floating mb-4 border rounded-3 border-dark">
                    <input type="text" class="form-control shadow-none border-0" name="username" id="floatingInput"
                        placeholder="Username" required>
                    <label for="floatingInput" class="text-secondary">Username</label>
                </div>
                <div class="form-floating d-flex border rounded-3 border-dark">
                    <input type="password" class="form-control border-0 shadow-none" name="password"
                        id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword" class="text-secondary">Password</label>
                    <div id="show" class="btn border-0 p-3"><img id="visibility" src="assets/svg/visibility off.svg"
                            class="" alt="show password"></div><br>
                </div>
                <button name="submit" class="btn btn-dark w-100 fw-bold mt-4 py-2 fs-5">Sign In</button>
            </form>
        </div>
    </div>
    <script>
        let show = document.getElementById("show");
        let password = document.getElementById("floatingPassword");
        let visible = document.getElementById("visibility");
        show.addEventListener("click", event => {
            event.preventDefault();
        });
        show.addEventListener("click", () => {
            if (password.type === "password") {
                visible.src = "assets/svg/visibility.svg";
                password.type = "text";
            }
            else {
                password.type = "password";
                visible.src = "assets/svg/visibility off.svg";
            }
        });
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>