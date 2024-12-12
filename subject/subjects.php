<?php 
include "../sidebar/sidebar.php";
include "../connection/connector.php";
function removeCoordinator($con,$subId){
    $removeCoordinator = mysqli_query($con,"UPDATE `coordinator` SET `subject id` = NULL,`subject name`= NULL WHERE `subject id` = '$subId'");
    $updateSubject = mysqli_query($con,"UPDATE `subject` SET `coordinator id` = NULL WHERE `subject id` = '$subId'");
    if($removeCoordinator && $updateSubject){        
        echo "UPDATE `coordinator` SET `subject id` = NULL,`subject name`= NULL WHERE `subject id` = '$subId'";
        ?>
        <script>
            alert("Coordinator Removed Successfully");
            window.open("subjects.php","_self");
        </script>
        <?php
    }
}
if(isset($_GET['subjectId'])){
    removeCoordinator($con,$_GET['subjectId']);
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
        <div class="p-3 border border-2 rounded-3 overflow-hidden">
            <div class="table-responsive p-1">                
            <table id="Table" class="table table-hover caption-top table-bordered">
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
                    $subId = $sub["subject id"];
                    $delLink = "subjects.php?subjectId=$subId";
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sub["id"]) ?></td>
                        <td><?php echo htmlspecialchars($sub["subject id"]) ?></td>
                        <td><?php echo htmlspecialchars($sub["subject name"]) ?></td>
                        <td>
                            <a class="text-decoration-none text-light p-0 m-0" href="edit subject.php?<?php echo htmlspecialchars("subjectId=".$sub["subject id"]."&subjectName=".$sub["subject name"]) ?>">
                                <button class="btn btn-dark px-2 py-0 my-1 shadow-none">Edit Name</button>
                            </a>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($sub["coordinator id"]==NULL ? "None" : $sub["coordinator id"]) ?>
                            <a class="text-decoration-none text-light p-0 m-0" href="change coordinator.php?<?php echo htmlspecialchars("subjectId=$subId") ?>">
                                <button class="btn btn-dark px-2 py-0 my-1 shadow-none">Change</button>
                            </a>
                            <button class="btn btn-danger px-2 py-0 my-1 shadow-none" onclick="removeCoordinator('<?php echo htmlspecialchars($delLink)?>')">Remove</button>
                        </td>
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
        let removeCoordinator = link =>{
            if(confirm("Remove Coordinator ?")){
                window.open(link,"_self");
            }
        }
    </script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>