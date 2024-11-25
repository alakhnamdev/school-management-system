<?php
include '../connection/connector.php';
function loadSubject($con,$student){
    $clas = mysqli_fetch_assoc(mysqli_query($con,"SELECT `class` FROM `student` WHERE `student id`='$student'"));
    $clas = $clas['class'];
    $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `class and subjects` WHERE `class`='$clas'"),MYSQLI_ASSOC);
    foreach($subjects[0] as $subId => $sub){
        $updateClass = mysqli_query($con,"UPDATE `student` SET `$subId` = '$sub' WHERE `student id` = '$student'");
        echo "$sub alloted in $subId in $student\n";
    }
}
loadSubject($con,"24SCHSTD25");
?>
<?php
include "../connection/connector.php";
function createSubject($con,$subject){
    $sub = strtolower($subject['subject id']);
    $create = mysqli_query($con,"CREATE TABLE `erpdb`.`$sub` (`id` INT NOT NULL AUTO_INCREMENT , `student id` INT(20) NULL , `student name` VARCHAR(70) NULL , `class` INT(2) NULL , `attendance` INT(3) NOT NULL , `marks` INT(3) NULL , `coordinator id` VARCHAR(20) NULL , PRIMARY KEY (`id`), UNIQUE (`student id`)) ENGINE = InnoDB");
    if($create){
    echo "$sub created as table\n";
    }
}
?>