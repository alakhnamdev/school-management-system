<?php include "../sidebar/sidebar crd.php";?>
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
            <header>
                <h3 class="h3 fw-bold">Students</h3>
                <hr class="hr">
            </header>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>                        
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Marks</th>
                        <th>Sessions</th>
                        <th>Attended</th>
                        <th>Absent</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    include '../connection/connector.php';
                    $user = $_SESSION["username"];
                    $subject = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject id`,`subject name` FROM `coordinator` WHERE `coordinator id`='$user'"));
                    $subId = strtolower($subject['subject id']);
                    $sub = $subject['subject id'];
                    $students = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `$subId`"),MYSQLI_ASSOC);                    
                    $session = mysqli_fetch_assoc(mysqli_query($con,"SELECT `session` FROM `subject sessions` WHERE `subject id`='$sub'")); 
                    $session = $session['session']==NULL ? 1 : $session['session'];                   
                    foreach($students as $stud){
                        $studId = $stud['student id'];
                        $studName =  mysqli_fetch_assoc(mysqli_query($con,"SELECT `student name`,`class` FROM `student` WHERE `student id`='$studId'"));
                        $class = $studName['class'];
                        $studName = $studName['student name'];
                        $marks = $stud['marks']==NULL ? 1 : $marks['marks'];
                        $attended = $stud['attendance']==NULL ? 1 : $stud['attendance'];
                        $absent = $session - $attended;                        
                        $attendance = ($attended/$session)*100;
                        $attendance = "$attendance%";
                        ?>
                    
                    <tr>
                        <td><?php echo htmlspecialchars($studId)?></td>
                        <td><?php echo htmlspecialchars($studName==NULL ? "None" : $studName)?></td>
                        <td><?php echo htmlspecialchars($class)?></td>
                        <td><?php echo htmlspecialchars($marks)?></td>
                        <td><?php echo htmlspecialchars($session)?></td>
                        <td><?php echo htmlspecialchars($attended)?></td>
                        <td><?php echo htmlspecialchars($absent)?></td>
                        <td><?php echo htmlspecialchars($attendance)?></td>
                    </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>