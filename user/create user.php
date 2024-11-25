<?php
include "../connection/connector.php";
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
function mergeUser($con, $user, $username)
{
    $mergeUserQuery = "INSERT INTO `$user` (`$user id`) VALUES ('$username')";
    $mergeUser = mysqli_query($con, $mergeUserQuery);
    if ($mergeUser) {
        echo "$username merged";
    }
}
if (isset($_POST['submit'])) {
    $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usercount"));
    $student = $data['student id'].$data['student'];
    $coordinator = $data['coordinator id'].$data['coordinator'];
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
</head>

<style>
    * {
        font-family: poppins;
    }
</style>

<body>
    <div class="p-3">
        <div class="p-3 border border-2 rounded-3">
            <table class="table caption-top">
                <caption class="h1 fw-bold">Create User</caption>
                <thead class="table-light">
                    <tr>
                        <th>Role</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form method="post" action="<?php echo htmlspecialchars("create user.php"); ?>">
                            <td>
                                <select name="role"
                                    class="px-2 text-secondary border-secondary py-1 rounded-2 shadow-none border border-2"
                                    onchange="updateUsername(this)">
                                    <option value="student" selected>Student</option>
                                    <option value="coordinator">Coordinator</option>
                                </select>
                            </td>
                            <td>
                                <label for="username">
                                    <input type="text" class="form-control shadow-none" id="username" disabled>
                                </label>
                            </td>
                            <td>
                                <div class="rounded-2 border border-2 d-flex">
                                    <input type="text" class="form-control shadow-none border-0 shadow-none" placeholder="password" name="password" id="password" value="alakh@2004" required>
                                    <div id="show" class="btn border-0" onclick="visibility(this)">hide</div><br>
                                </div>
                            </td>
                            <td>
                                <input type="submit" placeholder="submit" name="submit"
                                    class="btn btn-secondary px-2 py-1">
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
<?php
include '../connection/connector.php';
$data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usercount"));
$student = $data['student id'].$data['student'];
$coordinator = $data['coordinator id'].$data['coordinator'];
?>
let users = {coordinator:"<?php echo $coordinator ?>",student:"<?php echo $student ?>"};
<?php
?>

        let user = document.getElementById("username");
        user.value = users.student;

        let updateUsername = (e) => {
            if (e.value == "student") {
                user.value = users.student;
            }
            else {
                user.value = users.coordinator;
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
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>