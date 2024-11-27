<?php
include "../connection/connector.php";
if(!isset($_GET['subjectId']) || !isset($_GET['subjectName'])){
    echo "<script>window.open('subjects.php','_self')</script>";
}
else{
    function renameSubject($con,$subId,$subName){
        $updateQuery = "UPDATE `subject` SET `subject name` = '$subName' WHERE `subject id` = '$subId'";
        $updateSubject = mysqli_query($con,$updateQuery);
        if($updateSubject){
            echo $subId,$subName;
            ?>
            <script>
                alert("Subject Renamed");
                window.open("subjects.php","_self");
            </script>
            <?php
        }
    }
    function deleteSubject($con,$subId){
        $deleteSubject = mysqli_query($con,"DELETE FROM subject WHERE `subject id` = '$subId'");
        $subId = strtolower($subId);
        $deleteSubjectTable = mysqli_query($con,"DROP TABLE `$subId`");
        if($deleteSubject && $deleteSubjectTable){
            ?>
            <script>
                alert("Subject Deleted!");
                window.open("subjects.php","_self");
            </script>
            <?php
        }
    }
    if(isset($_GET['command'])){
        deleteSubject($con,$_GET['subjectId']);
    }
    if(isset($_GET['submit'])){
        renameSubject($con,$_GET['subjectId'],$_GET['subjectName']);
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
    </head>
    <style>
        *{
            font-family: poppins;
        }
    </style>
    <body>
        <div class="p-3">
            <div class="p-3 rounded-3 border border-2">
                <table class="table table-hover caption-top">
                    <caption class="h1 fw-bold">Edit Subject</caption>
                    <thead class="table-light">
                        <tr>
                            <th>Subject Id</th>
                            <th>Subject Name</th>
                            <th>Rename</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <form action="<?php echo htmlspecialchars("edit subject.php")?>" method="get">
                            <tr>
                            <td><?php echo htmlspecialchars($_GET['subjectId'])?></td>
                            <td><?php echo htmlspecialchars($_GET['subjectName'])?></td>
                                <td>
                                    <label for="subject name">
                                        <input type="hidden" name="subjectId" value="<?php echo htmlspecialchars($_GET['subjectId'])?>">
                                        <input class="form-control shadow-none" name="subjectName" type="text" placeholder="Subject Name" required>
                                    </label>
                                </td>
                                <td>
                                    <button name="submit" class="btn btn-secondary px-2 py-1">Rename</button>
                        </form>
                                    <button class="btn btn-secondary px-2 py-1 mx-2" onclick="deleteSubject()">Delete</button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let deleteSubject = ()=>{
            if(confirm("Do you want Delete!")){
                window.open("edit subject.php<?php echo htmlspecialchars("?subjectId=".$_GET['subjectId'])."&".htmlspecialchars("subjectName=".$_GET['subjectName'])."&command=delete" ?>","_self");
            }
        }
    </script>
    </body>
    </html>
    <?php
}
?>