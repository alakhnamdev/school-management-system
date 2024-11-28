<?php include "../sidebar/sidebar.php";?>
<?php 
include "../connection/connector.php";
if(!isset($_GET['class']) || !isset($_GET['subject'])){
    echo "<script>window.open('subject allocation.php','_self')</script>";
}
elseif(isset($_GET['command'])){    
    function removeSubject($con, $class, $subject)
    {
        $remove = mysqli_query($con, "UPDATE `class and subjects` SET `$subject`= NULL WHERE `class`='$class'");
        if ($remove) {
            ?>
            <script>
                alert("Subject Removed!");
                window.open("subject allocation.php", "_self");
            </script>
            <?php
        }
    }
    removeSubject($con, $_GET['class'], $_GET['subject']);
}
else{
    function allotSubject($con,$class,$subject,$subjectName){
        $allotQuery = "UPDATE `class and subjects` SET `$subject`='$subjectName' WHERE `class`='$class'";
        $allotSubject = mysqli_query($con,$allotQuery);
        if($allotSubject){
            ?>
            <script>
                alert("Subject Alloted");
            </script>
            <?php
        }
    }
    function allotSubjectToStudents($con,$class,$subject,$subjectName){
        $students = mysqli_fetch_all(mysqli_query($con,"SELECT `student id`,`$subject` FROM `student` WHERE `class`= '$class'"),MYSQLI_ASSOC);
        $count=0;
        foreach($students as $stud){
            $studId = $stud['student id'];
            $allot = mysqli_query($con,"UPDATE `student` SET `$subject`='$subjectName' WHERE `student id`='$studId'");
            if($allot){
                $count++;
            }
        }
        ?>
        <script>
            alert("<?php echo "$count user affected"?>");
            window.open("subject allocation.php","_self");
        </script>
        <?php
    }
    if(isset($_GET['submit'])){
        allotSubject($con,$_GET['class'],$_GET['subject'],$_GET['subjectName']);
        allotSubjectToStudents($con,$_GET['class'],$_GET['subject'],$_GET['subjectName']);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
        <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <style>
        *{
            font-family: poppins;
            outline: none;
        }
    </style>

    <body>
        <div class="p-3">
            <div class="p-3 rounded-4 border border-2">
                <table class="table caption-top">
                    <caption class="h1 fw-bold">Allot Subject</caption>
                    <tr class="table-light">
                        <th>Class</th>
                        <th>Subject</th>
                        <th colspan="2">Select Subject</th>
                    </tr>
                    <tr>
                        <?php
                        include "../connection/connector.php";
                        $class = $_GET['class'];
                        $subject = $_GET['subject'];
                        $subjects = mysqli_fetch_all(mysqli_query($con, "SELECT `subject id` FROM `subject`"), MYSQLI_ASSOC);
                        $extra = array_values(mysqli_fetch_assoc(mysqli_query($con, "SELECT `subject 1`, `subject 2`, `subject 3`, `subject 4`, `subject 5`, `subject 6` FROM `class and subjects` WHERE `class` = '$class'")));
                        array_splice($extra,substr($subject,8)-1,1);
                        for($i=count($subjects)-1;$i>=0;$i--){
                            if(in_array($subjects[$i]['subject id'],$extra)){
                                array_splice($subjects,$i,1);
                            }
                        }
                        ?>
                        <td><?php echo htmlspecialchars($class) ?></td>
                        <td><?php echo htmlspecialchars($subject) ?></td>
                        <td>
                            <form action="<?php echo htmlspecialchars("subject allot.php") ?>" method="get">
                                <label for="subjectName">
                                    <select name="subjectName" class="px-2 text-secondary border-secondary py-1 rounded-2 shadow-none border border-2">
                                        <?php
                                        foreach ($subjects as $sub) {
                                            $subId = $sub['subject id'];
                                            $subName = mysqli_fetch_assoc(mysqli_query($con, "SELECT `subject name` FROM `subject` WHERE `subject id`='$subId'"));
                                            $subName = "($subId) ".$subName['subject name'];
                                            ?>
                                            <option value="<?php echo $subId ?>"><?php echo $subName ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </label>
                                <input type="hidden" class="d-none" name="class" value="<?php echo $class ?>">
                                <input type="hidden" class="d-none" name="subject" value="<?php echo $subject ?>">
                                <label for="submit"><button name="submit" class="btn btn-secondary px-2 py-1 shadow-none">Allot</button></label>
                            </form>
                        </td>
                        <?php
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>
<?php 
}
?>