<?php
include "../sidebar/sidebar.php";
include "../connection/connector.php";
if (isset($_GET['user'])) {
    $userId = $_GET['user'];
    $user = str_contains($userId, "CRD") ? "coordinator" : "student";
    $deleteCredential = mysqli_query($con, "DELETE FROM `credential` WHERE `username` = '$userId'");
    $deleteUser = mysqli_query($con, "DELETE FROM `$user` WHERE `$user id` = '$userId'");
    $count = mysqli_fetch_assoc(mysqli_query($con, "SELECT `$user` FROM `usercount`"));
    $count = $count["$user"] == 0 ? 0 : $count["$user"] - 1;
    $updateCount = mysqli_query($con, "UPDATE `usercount` SET `$user`='$count'");
    if ($user == "student") {
        removeStudentFromSubject($con, $userId);
    }
    if ($deleteUser && $deleteCredential) {
        ?>
        <script>
        alert('<?php echo htmlspecialchars("$user : $userId deleted") ?>');
        window.open('manage users.php?user=<?php echo htmlspecialchars($user) ?>',"_self")
        </script>
        <?php
    }
}
function removeStudentFromSubject($con, $student)
{
    $subjects = mysqli_fetch_assoc(mysqli_query($con, "SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `student` WHERE `student id` = '$student'"));
    foreach ($subjects as $sub) {
        $sub = strtolower($sub);
        $deleteStudent = mysqli_query($con, "DELETE FROM `$sub` WHERE `student id` = '$student'");
        if ($deleteStudent) {
            echo "$student removed from $sub\n";
        }
    }
}
?>