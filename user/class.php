<?php
include '../connection/connector.php';
include "../sidebar/sidebar.php";
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
function removeStudentFromSubject($con,$student){
    $subjects = mysqli_fetch_assoc(mysqli_query($con, "SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `student` WHERE `student id` = '$student'"));
    foreach ($subjects as $sub) {
        $sub = strtolower($sub);
        $deleteStudent = mysqli_query($con,"DELETE FROM `$sub` WHERE `student id` = '$student'");
        if ($deleteStudent) {
            echo "$student removed from $sub\n";
        }
    }
}
function loadSubject($con,$student){
    $clas = mysqli_fetch_assoc(mysqli_query($con,"SELECT `class` FROM `student` WHERE `student id`='$student'"));
    $clas = $clas['class'];
    $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `class and subjects` WHERE `class`='$clas'"),MYSQLI_ASSOC);
    foreach($subjects[0] as $subId => $sub){
        $updateClass = mysqli_query($con,"UPDATE `student` SET `$subId` = '$sub' WHERE `student id` = '$student'");
    }
}
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $class = $_GET['class'];
    $updateName = mysqli_query($con,"UPDATE `student` SET `class` = '$class' WHERE `student id` = '$username'");
    if($updateName){
        removeStudentFromSubject($con,$username);
        loadSubject($con,$username);
        mergeStudentWithSubjects($con,$username);
        ?>
        <script>
            alert("Class Updated Successfully");
            window.open("manage users.php?user=student","_self");
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
                <h1 class="h1 fw-bold">Select Class</h1>
                <hr class="hr">
            </header>
            <form action="<?php echo htmlspecialchars("class.php")?>" method="get">
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Username</h4>
                    <input class="form-control disabled" value="<?php echo htmlspecialchars($_GET['user'])?>" disabled>
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($_GET['user'])?>">
                </div>
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Role</h4>
                    <input class="form-control disabled" value="<?php echo htmlentities($role)?>" disabled>
                </div>
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Select Class</h4>
                    <select name="class" class="px-2 text-secondary border-secondary py-1 rounded-2 shadow-none border border-2" required>
                        <?php
                        include '../connection/connector.php';
                        $classes = mysqli_fetch_all(mysqli_query($con, "SELECT `class` FROM `class and subjects` ORDER BY `id` ASC"), MYSQLI_ASSOC);
                        foreach ($classes as $class) {
                            ?>
                            <option value="<?php echo $class['class']?>"><?php echo $class['class']?></option>
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
</body>

</html>
<?php
}
?>