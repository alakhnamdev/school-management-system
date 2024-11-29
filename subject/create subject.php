<?php include "../sidebar/sidebar.php";?>
<?php
include "../connection/connector.php";
function createSubjectTable($con, $subject)
{
    $sub = strtolower($subject);
    $create = mysqli_query($con, "CREATE TABLE `erpdb`.`$sub` (`id` INT NOT NULL AUTO_INCREMENT , `student id` VARCHAR(20) NULL , `attendance` INT(3) NULL , `marks` INT(3) NULL , PRIMARY KEY (`id`), UNIQUE (`student id`)) ENGINE = InnoDB");
    if ($create) {
        echo "$sub created as table\n";
    }
}
function createSubjectSession($con, $subject)
{
    $create = mysqli_query($con, "INSERT INTO `subject sessions` (`subject id`) VALUES ('$subject')");
    if($create){        
        echo "$subject added in subject sessions\n";
    }
}
function createSubject($con, $subject)
{
    $subCode = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subject` ORDER BY `id` DESC"));
    $subCode = $subCode['id']+1;
    $subCode = "SUB" . str_pad($subCode, 3, "0", STR_PAD_LEFT);
    $createSubjectQuery = "INSERT INTO `subject` (`subject id`,`subject name`) VALUES ('$subCode','$subject')";
    $createSubject = mysqli_query($con, $createSubjectQuery);
    if ($createSubject) {
        createSubjectTable($con,$subCode);
        createSubjectSession($con,$subCode);
        ?>
        <script>
            alert("<?php echo "$subject created with $subCode (Subject Id)"?>");
            window.open("subjects.php","_self");
        </script>
        <?php
    }
}
if (isset($_POST['submit'])) {
    createSubject($con, $_POST['subject']);
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
        <div class="p-3 border border-2 rounded-3">            
            <header>
                <h3 class="h3 fw-bold">Create Subject</h3>
                <hr class="hr">
            </header>
            <form action="<?php echo htmlspecialchars("create subject.php") ?>" method="post">                
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Subject Id</h6>
                    <input type="text" id="subId" class="form-control shadow-none p-3" disabled>
                </div>    
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Subject Name</h6>  
                    <input type="text" name="subject" class="form-control shadow-none p-3" placeholder="Subject Name" required>
                </div>
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Select Coordinator</h6>
                    <select name="coordinator" class="text-secondary p-3 rounded-2 shadow-none border w-100">
                        <?php
                        include "../connection/connector.php";
                        $coordinator = mysqli_fetch_all(mysqli_query($con, "SELECT `coordinator id` FROM `coordinator`"),MYSQLI_ASSOC);
                        $extra = mysqli_fetch_all(mysqli_query($con, "SELECT `coordinator id` FROM `subject` WHERE `coordinator id` != 'NULL'"),MYSQLI_ASSOC);
                        for($i=0;$i<count($extra);$i++){
                            array_splice($coordinator,array_search($extra[$i],$coordinator),1);
                        }
                        foreach($coordinator as $coor){
                            ?>
                            <option value="<?php echo htmlspecialchars($coor['coordinator id'])?>"><?php echo htmlspecialchars($coor['coordinator id'])?></option>
                            <?php
                        }
                        ?>
                    </select>                    
                </div>
                <button class="btn btn-dark p-3 px-5" name="submit">Create Subject</button>
            </form>
        </div>
    </div>    
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        <?php
        $subCode = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subject` ORDER BY `id` DESC"));
        $subCode = $subCode['id']+1;
        $subCode = "SUB" . str_pad($subCode, 3, "0", STR_PAD_LEFT);
        echo "let subId = '$subCode';";
        ?>

        document.getElementById("subId").value = subId;
    </script>
</body>

</html>