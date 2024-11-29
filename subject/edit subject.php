<?php include "../sidebar/sidebar.php";?>
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
    function deleteSubjectSession($con,$subject){
        $create = mysqli_query($con, "DELETE FROM `subject sessions` WHERE `subject id` = '$subject'");
        if($create){        
            echo "$subject added in subject sessions\n";
        }
    }
    function deleteSubject($con,$subId){
        $deleteSubject = mysqli_query($con,"DELETE FROM subject WHERE `subject id` = '$subId'");
        $subId = strtolower($subId);
        $deleteSubjectTable = mysqli_query($con,"DROP TABLE `$subId`");
        if($deleteSubject && $deleteSubjectTable){
            deleteSubjectSession($con,$subId);
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
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <style>
        *{
            font-family: poppins;
        }
    </style>
    <body>
        <div class="p-3">
            <div class="p-3 rounded-3 border border-2">                
                <header>
                    <h3 class="h3 fw-bold">Edit Subject</h3>
                    <hr class="hr">
                </header>                
                <form action="<?php echo htmlspecialchars("edit subject.php")?>" method="get">                            
                    <div class="mb-3 ">
                        <h6 class="h6 fw-bold">Subject Id</h6>
                        <div class="form-control shadow-none p-3"><?php echo htmlspecialchars($_GET['subjectId'])?></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="h6 fw-bold">Subject Name</h6>
                        <div class="form-control shadow-none p-3"><?php echo htmlspecialchars($_GET['subjectName'])?></div>
                    </div>
                    <div class="mb-3 ">
                        <h6 class="h6 fw-bold">Rename</h6>
                        <input type="hidden" name="subjectId" value="<?php echo htmlspecialchars($_GET['subjectId'])?>">
                        <input class="form-control shadow-none p-3 w-100" name="subjectName" type="text" placeholder="Subject Name" required>
                    </div>
                    <div class="mb-3">
                        <h6 class="h6 fw-bold">Manage</h6>
                            <button name="submit" class="btn btn-dark px-5 p-3">Rename</button>
                </form>
                        <button class="btn btn-danger px-5 p-3" onclick="deleteSubject()">Delete</button>
                    </div>
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