<?php
include '../connection/connector.php';
include '../sidebar/sidebar crd.php';
function updateMarks($con,$students,$marks,$subject,$clas){
    $subject = strtolower($subject);
    for($i = 0; $i < count($students); $i++){
        $update = mysqli_query($con,"UPDATE `$subject` SET `marks`='$marks[$i]' WHERE `student id`='$students[$i]'");
    }
    ?>
    <script>
        alert('Marks Updated');
        window.open(`update academics.php?subjectId=<?php echo htmlentities($subject)?>&class=<?php echo htmlentities($clas)?>`,"_self");
    </script>
    <?php
}
if(isset($_POST['update'])){
    updateMarks($con,$_POST['users'],$_POST['marks'],$_POST['subjectId'],$_POST['class']);
}
if (isset($_POST['class']) && isset($_POST['subjectId']) && ! isset($_POST['update'])) {
    $users = $_POST['users'];
    $sub = $_POST['subjectId'];
    $subName = $_POST['subjectName'];
    $clas = $_POST['class'];
    $subId = strtolower($sub);
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
                    <form action="marks.php" method="post">
                    <input type="hidden" name="subjectId" value="<?php echo htmlentities($subId)?>">
                    <input type="hidden" name="subjectName" value="<?php echo htmlentities($subName)?>">
                    <input type="hidden" name="class" value="<?php echo htmlentities($clas)?>">
                    <table id="Table" class="table table-hover caption-top">
                    <caption class="h3 fw-bold"><?php echo htmlentities($subName)?> Marks</caption>
                    <thead>
                        <th>Id</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Marks</th>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $count = 0;
                        foreach ($users as $user) {
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo htmlentities($user);?></td>
                                <td>
                                    <?php 
                                    $studName = mysqli_fetch_assoc(mysqli_query($con,"SELECT `student name` FROM `student` WHERE `student id`= '$user'"));
                                    echo $studName['student name']==NULL ? "None" : $studName['student name'];
                                    ?>
                                </td>
                                <td>
                                    <input type="number" name="marks[]" required>
                                    <input type="hidden" name="users[]" value="<?php echo htmlentities($user)?>">
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    </table>
                    <button name="update" class="btn btn-dark shadow-none p-3 px-5">Update Students</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/jquery/jquery-3.7.1.min.js"></script>
        <script src="../assets/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/datatables/dataTables.bootstrap5.min.js"></script>
        <script>
            // $(document).ready( function () {
            //     $('#Table').DataTable();
            // } );
        </script>
    </body>

    </html>
    <?php
}
?>