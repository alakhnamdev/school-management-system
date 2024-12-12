<?php
include '../connection/connector.php';
include '../sidebar/sidebar.php';
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
function nonEmptySubjects($con){
    $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject id`,`subject name` FROM `subject`"),MYSQLI_ASSOC);
    $arr = [];
    foreach($subjects as $sub){
        $subName = $sub['subject name'];
        $sub = $sub['subject id'];
        $value = count(getClasses($con,$sub));
        if($value> 0){
            array_push($arr,['subject name'=>$subName,'subject id'=>$sub]);
        }
    }
    // print_r($arr);
    return $arr;
}
function viewBySubjects($con)
{
    $subjects = nonEmptySubjects($con);
    ?>
    <select id="subjects" class="w-100 px-2 text-secondary p-3 rounded-2 shadow-none border border-2">
    <?php
    foreach ($subjects as $sub) {
        $subId = $sub['subject id'];
        $subName = $sub['subject name'];
        ?>
            <option value="<?php echo htmlentities($subId) ?>"><?php echo htmlentities($subName) ?></option>
        <?php
    }
    ?>
    </select>
    <?php
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
if (!isset($_GET['subjectId'])) {
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
                        <h3 class="h3 fw-bold">Update Marks</h3>
                        <hr class="hr">
                    </header>
                    <div class="mb-3" id="class">
                        <h6 class="h6 fw-bold">Select Subject</h6>
                        <?php include '../connection/connector.php';viewBySubjects($con) ?>
                    </div>
                    <div>
                        <button name="submit" class="btn btn-dark shadow-none p-3 px-5" onclick="openSubject()">Open Subject</button>
                    </div>
                </div>
            </div>
        <script>
            let openSubject = ()=>{
                window.open(`update marks.php?subjectId=${document.getElementById('subjects').value}`,"_self");
            }
        </script>
        </body>

        </html>
    <?php
}
if (!isset($_GET['class']) && isset($_GET['subjectId'])) {
    $subId = $_GET['subjectId'];
    $subName = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject name` FROM `subject` WHERE `subject id`= '$subId'"));
    $subName = $subName['subject name'];
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
                    <h3 class="h3 fw-bold">Update Marks (<?php echo htmlentities($subName) ?>)</h3>
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
                window.open(`update marks.php?subjectId=<?php echo htmlentities($subId)?>&class=${document.getElementById('cls').value}`,"_self");
            }
        </script>
    </body>

    </html>
    <?php
}
if (isset($_GET['class']) && isset($_GET['subjectId'])) {
    $subId = $_GET['subjectId'];
    $subName = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject name` FROM `subject` WHERE `subject id`= '$subId'"));
    $subName = $subName['subject name'];
    $clas = $_GET['class'];
    $subId = strtolower($subId);
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
            <div class="p-3 border border-2 rounded-3 overflow-hidden">
                <div class="table-responsive">
                    <form id="userform" action="update.php" method="post">
                    <input type="hidden" name="subjectId" value="<?php echo htmlentities($subId)?>">
                    <input type="hidden" name="subjectName" value="<?php echo htmlentities($subName)?>">
                    <input type="hidden" name="class" value="<?php echo htmlentities($clas)?>">
                        <table id="Table" class="table table-hover caption-top">
                            <caption class="h3 fw-bold"><?php echo htmlentities($subName)?> Marks</caption>
                            <thead>
                                <th>Id</th>
                                <th>Student Id</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Marks</th>
                                <th>Select</th>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $students = mysqli_fetch_all(mysqli_query($con, "SELECT `$subId`.`id` ,`$subId`.`student id` ,`$subId`.`marks`,`student`.`student name`,`student`.`class` FROM `$subId` INNER JOIN `student` ON `$subId`.`student id`=`student`.`student id` WHERE `student`.`class`='$clas'"), MYSQLI_ASSOC);
                                $count = 0;
                                foreach ($students as $stud) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo htmlspecialchars($stud["student id"]) ?></td>
                                        <td><?php echo htmlspecialchars($stud["student name"]==NULL ? "None" : $stud["student name"]) ?></td>
                                        <td><?php echo htmlspecialchars($stud["class"]) ?></td>
                                        <td><?php echo htmlspecialchars($stud["marks"]==NULL ? 0 : $stud["marks"])  ?></td>
                                        <td><input class="users" type="checkbox" name="users[]" value="<?php echo htmlspecialchars($stud["student id"]) ?>"></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    <button class="btn btn-dark shadow-none p-3 px-5">Update Students</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/jquery/jquery-3.7.1.min.js"></script>
        <script src="../assets/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/datatables/dataTables.bootstrap5.min.js"></script>
        <script>
            let checkUsers = e => {
                let users = document.querySelectorAll('.users');
                let userform = document.getElementById('userform');
                userform.addEventListener('submit',(event)=>{
                    for(let i=0;i<users.length;i++){
                        if(users[i].checked){
                            return true;
                        }
                    }
                    event.preventDefault();
                })
            }
        </script>
    </body>

    </html>
    <?php
}
?>