<?php
include '../connection/connector.php';
include "../sidebar/sidebar.php";
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $name = $_GET['name'];
    $user = str_contains($username,"STD") ? "student" : "coordinator";
    $updateName = mysqli_query($con,"UPDATE $user SET `$user name` = '$name' WHERE `$user id` = '$username'");
    if($updateName){
        ?>
        <script>
            alert("Name Updated Successfully");
            window.open("manage users.php?user=<?php echo htmlspecialchars($user)?>","_self");
        </script>
        <?php
    }
}
else if(!isset($_GET['user'])) {
    echo "<script>window.open('user.php','_self')</script>";
}
else{
    $role = str_contains($_GET['user'],"STD") ? "Student" : "Coordinator"; 
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
</head>

<body>

    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>
                <h3 class="h3 fw-bold">Edit Name</h3>
                <hr class="hr">
            </header>
            <form action="<?php echo htmlspecialchars("name.php")?>" method="get">
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Username</h6>
                    <input class="form-control disabled p-3" value="<?php echo htmlspecialchars($_GET['user'])?>" disabled>
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($_GET['user'])?>">
                </div>
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Role</h6>
                    <input class="form-control disabled p-3" value="<?php echo htmlentities($role)?>" disabled>
                </div>
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Name</h6>
                    <input type="text" class="form-control shadow-none p-3" placeholder="Enter Name" name="name" required>
                </div>
                <div>
                    <button name="submit" class="btn btn-dark shadow-none p-3 px-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
}
?>