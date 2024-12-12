<?php include "../sidebar/sidebar.php";?>
<?php
include '../connection/connector.php';
function viewBySubjects($con)
{
    $subjects = mysqli_fetch_all(mysqli_query($con, "SELECT `subject id`,`subject name` FROM `subject`"), MYSQLI_ASSOC);
    $count = 0;
    foreach ($subjects as $sub) {
        $count++;
        $subId = $sub['subject id'];
        $subName = $sub['subject name'];
        ?>
        <tr>
            <td><?php echo $count ?></td>
            <td><?php echo htmlspecialchars($subId) ?></td>
            <td><?php echo htmlspecialchars($subName) ?></td>
            <td>
                <a href="attendance.php?subjectId=<?php echo urlencode($subId) ?>&subjectName=<?php echo urlencode($subName) ?>" class="text-decoration-none bg-dark rounded-3 p-1">
                    <button class="btn text-light py-1 px-2 border-0">Open</button>
                </a>
            </td>
        </tr>
        <?php
    }
}
function viewByClass($con)
{
    $classes = mysqli_fetch_all(mysqli_query($con, "SELECT `class` FROM `class and subjects` ORDER BY `id`"), MYSQLI_ASSOC);
    foreach ($classes as $clas) {
        $clas = $clas['class'];
        ?>
        <a href="subject.php?subjectId=<?php echo urlencode($clas) ?>"
            class="text-decoration-none bg-dark rounded-3">
            <button class="btn text-light p-3">
                <?php echo htmlspecialchars($clas) ?>
            </button>
        </a>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
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

<style>
    * {
        font-family: poppins;
    }
</style>

<body>

    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <div class="table-responsive">
                <table id="Table" class="table table-bordered table-hover caption-top">
                    <caption class="h3 fw-bold">View By Subjects</caption>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Subject Id</th>
                            <th>Subject Name</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php viewBySubjects($con) ?>
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