<?php
include "./connection/connector.php";
function createSubject($con,$subject){
    $sub = strtolower($subject['subject id']);
    $create = mysqli_query($con,"CREATE TABLE `erpdb`.`$sub` (`id` INT NOT NULL AUTO_INCREMENT , `student id` INT(20) NULL , `student name` VARCHAR(70) NULL , `class` INT(2) NULL , `attendance` INT(3) NOT NULL , `marks` INT(3) NULL , `coordinator id` VARCHAR(20) NULL , PRIMARY KEY (`id`), UNIQUE (`student id`)) ENGINE = InnoDB");
    if($create){
    echo "$sub created as table\n";
    }
}
?>