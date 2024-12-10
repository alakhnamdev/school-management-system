<?php include "../sidebar/sidebar.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<style>
    *{
        font-family: poppins;
    }
</style>

<body>
    <div class="p-3">
        <div class="p-3 border border-2 rounded-3">
            <table class="table table-hover caption-top">
                <caption class="h3 fw-bold">Manage Subjects</caption>
                <thead>
                    <th>Id</th>
                    <th>Subject Id</th>
                    <th>Subject Name</th>
                    <th>Manage</th>
                    <th>Coordinator Id</th>
                </thead>
                <tbody class="table-group-divider">
                <?php
                include "../connection/connector.php";
                $subjects = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM `subject`"), MYSQLI_ASSOC);
                foreach ($subjects as $sub) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sub["id"]) ?></td>
                        <td><?php echo htmlspecialchars($sub["subject id"]) ?></td>
                        <td><?php echo htmlspecialchars($sub["subject name"]) ?></td>
                        <td>
                            <a class="text-decoration-none text-light p-0 m-0" href="edit subject.php?<?php echo htmlspecialchars("subjectId=".$sub["subject id"]."&subjectName=".$sub["subject name"]) ?>">
                                <button class="btn btn-dark px-2 py-0 shadow-none">Edit</button>
                            </a>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($sub["coordinator id"]==NULL ? "None" : $sub["coordinator id"]) ?>                            
                            <a class="text-decoration-none text-light p-0 m-0" href="change coordinator.php?<?php echo htmlspecialchars("subjectId=".$sub["subject id"]) ?>">
                                <button class="btn btn-dark px-2 py-0 shadow-none">Change</button>
                            </a>                            
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>