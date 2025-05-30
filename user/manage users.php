<?php
include "../sidebar/sidebar.php";
if (!isset($_GET['user'])) {
    echo "<script>window.open('user.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/datatables/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<style>
    body{
        margin-top: 80px;
    }
</style>

<body>
    <div class="p-3">
        <div id="main" class="p-3 rounded-4 border border-2 overflow-hidden">
            <div class="table-responsive p-1">
            <table id="Table" class="table table-hover caption-top table-bordered">
                <caption class="h3 fw-bold">Users</caption>
                <thead class="table-light">
                    <?php
                    include "../connection/connector.php";
                    $user = $_GET['user'];
                    if ($user == "coordinator") {
                        ?>
                        <th>Id</th>
                        <th>Coordinator Id</th>
                        <th>Coordinator Name</th>
                        <th>Subject Id</th>
                        <th>Subject Name</th>
                        <th>Manage</th>
                        <?php
                    } else {
                        ?>
                        <th>Id</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                        <th>Subject 4</th>
                        <th>Subject 5</th>
                        <th>Subject 6</th>
                        <th>Manage</th>
                        <?php
                    }
                    ?>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $qry = "SELECT * FROM `$user`";
                    $run = mysqli_query($con, $qry);
                    $data = mysqli_fetch_all($run, MYSQLI_ASSOC);
                    foreach ($data as $cor) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cor["id"]) ?></td>
                            <td><?php echo htmlspecialchars($cor["$user id"]) ?></td>
                            <td><?php echo htmlspecialchars(($cor["$user name"] == null) ? "None" : $cor["$user name"]) ?></td>
                            <?php
                            if ($user == "coordinator") {
                                ?>
                                <td><?php echo htmlspecialchars(($cor["subject id"] == null) ? "None" : $cor["subject id"]) ?></td>
                                <td><?php echo htmlspecialchars(($cor["subject name"] == null) ? "None" : $cor["subject name"]) ?></td>
                                <td>
                                    <a href="name.php?user=<?php echo htmlspecialchars($cor["$user id"])?>"><button class="btn btn-dark p-0 px-2 mx-1 my-1">Edit</button></a>
                                    <a href="delete.php?user=<?php echo htmlspecialchars($cor["$user id"])?>"><button class="btn btn-danger p-0 px-2 my-1">Delete</button></a>
                                </td>
                                <?php
                            } else {
                                ?>
                                <td><?php echo htmlspecialchars($cor["class"] == null) ? "None" : $cor["class"] ?></td>
                                <?php 
                                for($i=1;$i<=6;$i++){
                                    ?>
                                    <td><?php
                                    $subName = $cor["subject $i"];
                                    $subName = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject name` FROM subject WHERE `subject id` = '$subName'"));
                                    echo htmlspecialchars($cor["subject $i"] == null) ? "None" : $subName['subject name'] ?></td>
                                    <?php
                                }
                                ?>
                                <td>
                                    <a href="name.php?user=<?php echo htmlspecialchars($cor["$user id"])?>"><button class="btn btn-dark p-0 px-2 mx-2 my-1">Edit Name</button></a>
                                    <a href="class.php?user=<?php echo htmlspecialchars($cor["$user id"])?>"><button class="btn btn-dark p-0 px-2 mx-2 my-1">Edit Class</button></a>
                                    <a href="delete.php?user=<?php echo htmlspecialchars($cor["$user id"])?>"><button class="btn btn-danger p-0 px-2 mx-2 my-1">Delete</button></a>
                                </td>
                                <?php
                            }
                            ?>
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
        let main = document.getElementById("main");
    </script>
</body>

</html>