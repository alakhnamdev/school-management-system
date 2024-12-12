<?php include "../sidebar/sidebar.php";?>
<?php
include "../connection/connector.php";
if (!isset($_GET['subjectId'])) {
    ?>
    <script>
        alert("Invalid Entry!");
        window.open("../academics/", "_self");
    </script>
    <?php
} else {
    $subName = $_GET['subjectName'];
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
            <div class="p-3 border border-2 rounded-3 overflow-hidden">
                <div class="table-responsive">
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
                        $students = mysqli_fetch_all(mysqli_query($con, "SELECT `$studId`.`id` ,`$studId`.`student id` ,`$studId`.`marks`,`student`.`student name`,`student`.`class` FROM `$studId` INNER JOIN `student` ON `$studId`.`student id`=`student`.`student id`"), MYSQLI_ASSOC);
                        $count = 0;
                        foreach ($students as $stud) {
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo htmlspecialchars($stud["student id"]) ?></td>
                                <td><?php echo htmlspecialchars($stud["student name"]==NULL ? "None" : $stud["student name"]) ?></td>
                                <td><?php echo htmlspecialchars($stud["class"]) ?></td>
                                <td><?php echo htmlspecialchars($stud["marks"]==NULL ? "0" : $stud["marks"])  ?></td>
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