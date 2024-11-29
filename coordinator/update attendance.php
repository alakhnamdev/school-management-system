<?php include "../sidebar/sidebar crd.php";?>
<?php
include '../connection/connector.php';
if(isset($_GET['users'])){
    function updateAttendance($con,$users,$subject){
        foreach($users as $username){
            $attendance = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attendance` FROM `$subject` WHERE `student id`='$username'"));
            $attendance = $attendance['attendance']+1;
            $update = mysqli_query($con,"UPDATE `$subject` SET `attendance`='$attendance' WHERE `student id`='$username'");
        }
        $session = mysqli_fetch_assoc(mysqli_query($con,"SELECT `session` FROM `subject sessions` WHERE `subject id`='$subject'"));
        $session = $session['session']+1;
        $updateSession = mysqli_query($con,"UPDATE `subject sessions` SET `session`='$session' WHERE `subject id`='$subject'");
        if($updateSession){
            ?>
            <script>
                alert("Attendance Submitted Successfully");
                window.open("update attendance.php?<?php htmlspecialchars($_GET['class'])?>","_self");
            </script>
            <?php
        }
    }
    updateAttendance($con,$_GET['users'],$_GET['subjectId']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<style>
    *{
        font-family: poppins;
    }
</style>

<body>
    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <form action="update attendance.php" action="get">
            <header>
                <h3 class="h3 fw-bold">Attendance (<?php echo htmlspecialchars($_GET['class'])?>)</h3>
                <hr class="hr">
            </header>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>                        
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Sessions</th>
                        <th>Attended</th>
                        <th>Absent</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    include '../connection/connector.php';
                    $user = $_SESSION["username"];
                    $cls = $_GET["class"];
                    $subject = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject id`,`subject name` FROM `coordinator` WHERE `coordinator id`='$user'"));
                    $subId = strtolower($subject['subject id']);
                    $sub = $subject['subject id'];
                    $students = mysqli_fetch_all(mysqli_query($con,"SELECT `$subId`.`student id`,`$subId`.`marks`,`$subId`.`attendance`,`student`.`student name` FROM `$subId` INNER JOIN `student` ON `$subId`.`student id`=`student`.`student id` WHERE `class`='$cls'"),MYSQLI_ASSOC);                    
                    $session = mysqli_fetch_assoc(mysqli_query($con,"SELECT `session` FROM `subject sessions` WHERE `subject id`='$sub'")); 
                    $session = $session['session']==NULL ? 1 : $session['session'];                   
                    foreach($students as $stud){
                        $studId = $stud['student id'];
                        $studName = $stud['student name'];
                        $attended = $stud['attendance']==NULL ? 1 : $stud['attendance'];
                        $absent = $session - $attended;
                        ?>
                    
                    <tr>
                        <td><?php echo htmlspecialchars($studId)?></td>
                        <td><?php echo htmlspecialchars($studName==NULL ? "None" : $studName)?></td>
                        <td><?php echo htmlspecialchars($cls)?></td>
                        <td><?php echo htmlspecialchars($session)?></td>
                        <td><?php echo htmlspecialchars($attended)?></td>
                        <td><?php echo htmlspecialchars($absent)?></td>
                        <td><input type="checkbox" name="users[]" value="<?php echo htmlspecialchars($studId)?>"></td>
                        <input type="hidden" name="class" value="<?php echo htmlspecialchars($_GET['class'])?>">
                        <input type="hidden" name="subjectId" value="<?php echo htmlspecialchars($subId)?>">
                    </tr>
                        <?php
                    }
                    ?>                    
                </tbody>
            </table>
            <button class="btn btn-dark shadow-none text-decoration-none text-light p-3">Submit</button>
            </form>
        </div>
    </div>
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>