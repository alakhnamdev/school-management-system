<?php
include "../connection/connector.php";
include "../sidebar/sidebar.php";
function createUser($con, $username, $password, $role)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    $createQuery = "INSERT INTO `credential`(`username`, `password`, `role`) VALUES ('$username','$password','$role')";
    $create = mysqli_query($con, $createQuery);
    if ($create) {
        echo "$username added as $role<br>";
    }
}
function updateUserCount($con, $user, $username)
{
    $oldCount = (int) substr($username, 8);
    $newCount = $oldCount + 1;
    $updateQuery = "UPDATE `usercount` SET `$user`='$newCount' WHERE `$user`='$oldCount'";
    $update = mysqli_query($con, $updateQuery);
    if ($update) {
        echo "User count of $user updated (New Count = $newCount)";
        ?>
        <script>
            alert("User created")
            window.open("./user.php", "_self")
        </script>
        <?php
    }
}
function mergeStudentWithSubjects($con, $student)
{
    $subjects = mysqli_fetch_assoc(mysqli_query($con, "SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `student` WHERE `student id` = '$student'"));
    foreach ($subjects as $sub) {
        $sub = strtolower($sub);
        $addStudent = mysqli_query($con, "INSERT INTO `$sub` (`student id`) VALUES ('$student')");
        if ($addStudent) {
            echo "$student added to $sub\n";
        }
    }
}
function updateStudentClass($con, $student, $clas)
{
    $updateStd = mysqli_query($con, "UPDATE `student` SET `class` = '$clas' WHERE `student id` = '$student'");
}
function loadSubject($con,$student){
    $clas = mysqli_fetch_assoc(mysqli_query($con,"SELECT `class` FROM `student` WHERE `student id`='$student'"));
    $clas = $clas['class'];
    $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `class and subjects` WHERE `class`='$clas'"),MYSQLI_ASSOC);
    foreach($subjects[0] as $subId => $sub){
        $updateClass = mysqli_query($con,"UPDATE `student` SET `$subId` = '$sub' WHERE `student id` = '$student'");
    }
    if($updateClass){
        return true;
    }
}
function mergeUser($con, $user, $username)
{
    $mergeUserQuery = "INSERT INTO `$user` (`$user id`) VALUES ('$username')";
    $mergeUser = mysqli_query($con, $mergeUserQuery);
    if ($mergeUser) {
        if ($user == "student") {
            updateStudentClass($con, $username, $_POST['class']);
            loadSubject($con,$username);
            mergeStudentWithSubjects($con,$username);
        }
        echo "$username merged".$_POST['class'];
    }
}
if (isset($_POST['submit'])) {
    $data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM usercount"));
    $student = $data['student id'] . $data['student'];
    $coordinator = $data['coordinator id'] . $data['coordinator'];
    $username = $_POST['role'] == "student" ? $student : $coordinator;
    createUser($con, $username, $_POST['password'], $_POST['role']);
    updateUserCount($con, $_POST['role'], $username);
    mergeUser($con, $_POST['role'], $username);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="p-3">
        <div class="p-3 border border-2 rounded-3">
            <header>
                <h1 class="h1 fw-bold">Create User</h1>
                <hr class="hr">
            </header>
            <form method="post" action="<?php echo htmlspecialchars("create user.php"); ?>">
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Username</h4>
                    <input type="text" class="form-control shadow-none" id="username" disabled>
                </div>
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Role</h4>
                    <select name="role"
                        class="w-100 px-2 text-secondary border-secondary py-1 rounded-2 shadow-none border border-2"
                        onchange="updateUsername(this)">
                        <option value="student" selected>Student</option>
                        <option value="coordinator">Coordinator</option>
                    </select>
                </div>
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Password</h4>
                    <div class="rounded-2 border border-2 d-flex border-secondary">
                        <input type="text" class="form-control shadow-none border-0 shadow-none" placeholder="password"
                            name="password" id="password" value="alakh@2004" required>
                        <div id="show" class="btn border-0" onclick="visibility(this)">hide</div><br>
                    </div>
                </div>
                <div class="mb-3" id="class">
                    <h4 class="h4 fw-bold">Select Class</h4>
                    <select name="class"
                        class="w-100 px-2 text-secondary border-secondary py-1 rounded-2 shadow-none border border-2"
                        id="classes">
                        <?php
                        include '../connection/connector.php';
                        $classes = mysqli_fetch_all(mysqli_query($con, "SELECT `class` FROM `class and subjects` ORDER BY `id` ASC"), MYSQLI_ASSOC);
                        foreach ($classes as $class) {
                            ?>
                            <option value="<?php echo $class['class'] ?>"><?php echo $class['class'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div>
                    <button name="submit" class="btn btn-dark shadow-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        <?php
        include '../connection/connector.php';
        $data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM usercount"));
        $student = $data['student id'] . $data['student'];
        $coordinator = $data['coordinator id'] . $data['coordinator'];
        ?>
        let users = { coordinator: "<?php echo $coordinator ?>", student: "<?php echo $student ?>" };
        <?php
        ?>

            let user = document.getElementById("username");
        let clas = document.getElementById("class");
        let classes = document.getElementById("classes");
        user.value = users.student;

        let updateUsername = (e) => {
            if (e.value == "student") {
                user.value = users.student;
                classes.disabled = false;
                clas.style.display = "block";
            }
            else {
                user.value = users.coordinator;
                classes.disabled = true;
                clas.style.display = "none";
            }
        }
        document.getElementById("show").addEventListener("click", event => {
            event.preventDefault();
        });
        let visibility = (e) => {
            let password = document.getElementById("password");
            if (e.innerHTML == "show") {
                password.type = "text";
            }
            else {
                password.type = "password";
            }
            e.innerHTML = e.innerHTML == "show" ? "hide" : "show";
        }
    </script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>