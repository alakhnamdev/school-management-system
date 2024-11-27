<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<style>
    *{
        font-family: poppins;
    }
</style>

<body>
    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <table class="table table-hover caption-top">
                <caption class="h1 fw-bold">Subject Allocation</caption>
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Class</th>
                        <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                        <th>Subject 4</th>
                        <th>Subject 5</th>
                        <th>Subject 6</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                include "../connection/connector.php";
                $subjects = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM `class and subjects`"), MYSQLI_ASSOC);
                foreach ($subjects as $sub) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sub["id"]) ?></td>
                        <td><?php echo htmlspecialchars($sub["class"]) ?></td>
                        <?php 
                        for($i=1;$i<=6;$i++){
                            ?>
                            <td>
                                <div class="bg-secondary text-light p-2 mb-1 rounded-3"><?php 
                                $subName = $sub["subject $i"];
                                $subName = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject name` FROM subject WHERE `subject id` = '$subName'"));
                                echo htmlspecialchars($subName == null ? "Not Selected " : $subName['subject name']);?>
                                </div>
                                <button class=" py-0 ml-3 border-0 px-2 btn btn-dark rounded-3">
                                    <a class="px-1 text-light text-decoration-none" href="subject allot.php<?php echo htmlspecialchars("?class=".$sub['class']."&subject=subject $i")?>">Edit</a>
                                </button>
                                <button class=" py-0 border-0 px-2 btn btn-danger rounded-3">
                                    <a class="px-1 text-light text-decoration-none" href="subject allot.php<?php echo htmlspecialchars("?class=".$sub['class']."&subject=subject $i&command=remove")?>">Remove</a>
                                </button>
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
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>