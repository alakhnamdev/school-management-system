<?php include "../sidebar/sidebar std.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/datatables/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<style>
    *{
        font-family: poppins;
    }
</style>

<body>
    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>
                <h3 class="h3 fw-bold">Academics</h3>
                <hr class="hr">
            </header>
            <div class="table-responsive">                
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>                        
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        include '../connection/connector.php';
                        $user = $_SESSION["username"];
                        $subjects = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `student` WHERE `student id`='$user'"));
                        for($i=1;$i<=6;$i++){
                            $sub = $subjects["subject $i"];
                            $subName = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject name` FROM `subject` WHERE `subject id`='$sub'"));
                            $subName = $subName['subject name'];
                            $subTable = strtolower($sub);
                            $marks = mysqli_fetch_assoc(mysqli_query($con,"SELECT `marks` FROM `$subTable` WHERE `student id`='$user'"));
                            $marks = $marks['marks']==NULL ? 1 : $marks['marks'];
                            ?>
                        <tr>
                            <td><?php echo htmlspecialchars($sub); ?></td>
                            <td><?php echo htmlspecialchars($subName); ?></td>
                            <td><?php echo htmlspecialchars($marks); ?></td>
                        </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>