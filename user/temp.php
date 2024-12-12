<?php
include '../connection/connector.php';
// function loadSubject($con,$student){
//     $clas = mysqli_fetch_assoc(mysqli_query($con,"SELECT `class` FROM `student` WHERE `student id`='$student'"));
//     $clas = $clas['class'];
//     $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `class and subjects` WHERE `class`='$clas'"),MYSQLI_ASSOC);
//     foreach($subjects[0] as $subId => $sub){
//         $updateClass = mysqli_query($con,"UPDATE `student` SET `$subId` = '$sub' WHERE `student id` = '$student'");
//         echo "$sub alloted in $subId in $student\n";
//     }
// }
// loadSubject($con,"24SCHSTD25");
// function createSubject($con, $subject)
// {
//     $sub = strtolower($subject);
//     $create = mysqli_query($con, "CREATE TABLE `erpdb`.`$sub` (`id` INT NOT NULL AUTO_INCREMENT , `student id` VARCHAR(20) NULL , `attendance` INT(3) NULL , `marks` INT(3) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB");
//     if ($create) {
//         echo "$sub created as table\n";
//     }
// }
// function updateSubjectForCoordinator($con,$coordinator){
//     $coordinators = mysqli_fetch_assoc(mysqli_query($con,"SELECT `coordinator id`,`subject id`,`subject name` FROM `subject` WHERE `coordinator id` IS NOT NULL"));
//     $subId = $coordinators['subject id'];
//     $coorId = $coordinators['coordinator id'];
//     $subName = $coordinators['subject name'];
//     $update = mysqli_query($con,"UPDATE `coordinator` SET `subject id` = '$subId', `subject name` = '$subName' WHERE `coordinator id`='$coorId'");
// }
// updateSubjectForCoordinator($con,"24SCHCRD22");
// function addSubjects($con)
// {
//     $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject id` FROM `subject`"),MYSQLI_ASSOC);
//     foreach($subjects as $sub){
//         createSubject($con,$sub['subject id']);
//     }
// }
// addSubjects($con);
// createSubject($con,'sub001');
// function mergeStudentWithSubjects($con, $student)
// {
//     $subjects = mysqli_fetch_assoc(mysqli_query($con, "SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `student` WHERE `student id` = '$student'"));
//     foreach ($subjects as $sub) {
//         $sub = strtolower($sub);
//         $addStudent = mysqli_query($con, "INSERT INTO `$sub` (`student id`) VALUES ('$student')");
//         if ($addStudent) {
//             echo "$student added to $sub\n";
//         }
//     }
// }
// function removeStudentFromSubject($con,$student){
//     $subjects = mysqli_fetch_assoc(mysqli_query($con, "SELECT `subject 1`,`subject 2`,`subject 3`,`subject 4`,`subject 5`,`subject 6` FROM `student` WHERE `student id` = '$student'"));
//     foreach ($subjects as $sub) {
//         $sub = strtolower($sub);
//         $deleteStudent = mysqli_query($con,"DELETE FROM `$sub` WHERE `student id` = '$student'");
//         if ($deleteStudent) {
//             echo "$student removed from $sub\n";
//         }
//     }
// }
// mergeStudentWithSubjects($con, "24SCHSTD2");
// removeStudentFromSubject($con, "24SCHSTD28");
// function mergeAllStudentsWithSubject($con){
//     $students = mysqli_fetch_all(mysqli_query($con,"SELECT `student id` FROM `student` ORDER BY `id`"),MYSQLI_ASSOC);
//     foreach($students as $stu){
//         $stu = $stu['student id'];
//         mergeStudentWithSubjects($con,$stu);
//     }
// }
// mergeAllStudentsWithSubject($con);
// s
// // createSubjectSession($con,"sub001");
// function createAllSubjectSessions($con)
// {
//     $subjects = mysqli_fetch_all(mysqli_query($con, "SELECT `subject id` FROM `subject`"), MYSQLI_ASSOC);
//     foreach ($subjects as $sub) {
//         createSubjectSession($con, $sub['subject id']);
//     }
// }
// createAllSubjectSessions($con);
// session_start();
// echo $_SESSION['username'];
// if(str_contains($_SESSION['username'],"STD")){
//     echo "student";
// }
// function getClasses($con,$subject){
//     $classes = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `class and subjects`"),MYSQLI_ASSOC);
//     $arr = [];
//     foreach($classes as $cls){
//         if(in_array($subject,$cls)){
//             array_push($arr,$cls['class']);
//         }
//     }
//     return $arr;
// }
// $arr = getClasses($con,"SUB001");
// function subjectClasses($con){
//     $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject id` FROM `subject`"),MYSQLI_ASSOC);
//     $arr = [];
//     foreach($subjects as $sub){
//         $sub = $sub['subject id'];
//         // array_push($arr,getClasses($con,$sub));
//         $arr[$sub] = getClasses($con,$sub);
//     }
//     print_r($arr);
//     return $arr;
// }
// function nonEmptySubjects($con){
//     $subjects = mysqli_fetch_all(mysqli_query($con,"SELECT `subject id`,`subject name` FROM `subject`"),MYSQLI_ASSOC);
//     $arr = [];
//     foreach($subjects as $sub){
//         $subName = $sub['subject name'];
//         $sub = $sub['subject id'];
//         $value = count(getClasses($con,$sub));
//         if($value> 0){
//             array_push($arr,[$subName,$sub]);
//         }
//     }
//     print_r($arr);
//     return count($arr);
// }
// subjectClasses($con);
// echo nonEmptySubjects($con);
?>