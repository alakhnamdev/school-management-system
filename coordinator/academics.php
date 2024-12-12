<?php 
include "../sidebar/sidebar crd.php";
include "../connection/connector.php";

function getClasses($con,$subject){
    $classes = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `class and subjects`"),MYSQLI_ASSOC);
    $arr = [];
    foreach($classes as $cls){
        if(in_array($subject,$cls)){
            array_push($arr,$cls['class']);
        }
    }
    return $arr;
}
function viewByClass($con,$subject)
{
    $classes = getClasses($con, $subject);
    ?>
    <select id="cls" class="w-100 px-2 text-secondary p-3 rounded-2 shadow-none border border-2">
    <?php
    foreach ($classes as $clas) {
        ?>
            <option value="<?php echo htmlentities($clas) ?>"><?php echo htmlentities($clas) ?></option>
        <?php
    }
    ?>
    </select>
    <?php
}
if (!isset($_GET['class'])) {
    $user = $_SESSION['username'];
    $sub = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject name`,`subject id` FROM `coordinator` WHERE `coordinator id`= '$user'"));
    $subName = $sub['subject name'];
    $subId = $sub['subject id'];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <div class="p-3">
            <div class="p-3 border border-2 rounded-3">
                <header>
                    <h3 class="h3 fw-bold"><?php echo htmlentities($subName) ?> Marks</h3>
                    <hr class="hr">
                </header>
                <div class="mb-3" id="class">
                    <h6 class="h6 fw-bold">Select Class</h6>
                    <?php include '../connection/connector.php';viewByClass($con, $subId) ?>
                </div>
                <div>
                    <button name="submit" class="btn btn-dark shadow-none p-3 px-5"  onclick="openClass()">Open Class</button>
                </div>
            </div>
        </div>
        <script>
            let openClass = ()=>{
                window.open(`academics.php?subjectId=<?php echo htmlentities($subId)?>&subjectName=<?php echo htmlentities($subName)?>&class=${document.getElementById('cls').value}`,"_self");
            }
        </script>
    </body>

    </html>
    <?php
}
else {
    $subName = $_GET['subjectName'];
    $clas = $_GET['class'];
    $studId = strtolower($_GET['subjectId']);
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
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link href="../assets/datatables/dataTables.bootstrap5.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="p-3">
            <div class="p-3 border border-2 rounded-3">
                <div class="table-responsive p-1">
                <table id="Table" class="table table-hover caption-top">
                    <caption class="h3 fw-bold"><?php echo htmlentities($subName)?> Marks</caption>
                    <thead>
                        <th>Id</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Marks</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $students = mysqli_fetch_all(mysqli_query($con, "SELECT `$studId`.`id` ,`$studId`.`student id` ,`$studId`.`marks`,`student`.`student name`,`student`.`class` FROM `$studId` INNER JOIN `student` ON `$studId`.`student id`=`student`.`student id` WHERE `student`.`class`='$clas'"), MYSQLI_ASSOC);
                        $subId = $_GET['subjectId'];
                        $sessions = mysqli_fetch_assoc(mysqli_query($con, "SELECT `session` FROM `subject sessions` WHERE `subject id`='$subId'"));
                        $count = 0;
                        foreach ($students as $stud) {
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo htmlspecialchars($stud["student id"]) ?></td>
                                <td><?php echo htmlspecialchars($stud["student name"]==NULL ? "None" : $stud["student name"]) ?></td>
                                <td><?php echo htmlspecialchars($stud["class"]) ?></td>
                                <td><?php echo htmlspecialchars($stud["marks"]==NULL ? 1 : $stud["marks"]) ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <script src="../assets/jquery/jquery-3.7.1.min.js"></script>
        <script src="../assets/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/datatables/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#Table').DataTable();
            } );
        </script>
    </body>

    </html>
    <?php
}
?>