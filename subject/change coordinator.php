<?php
include '../connection/connector.php';
function updateCoordinator($con,$subId,$coordinator){
    $update = mysqli_query($con,"UPDATE `subject` SET `coordinator id` = '$coordinator' WHERE `subject id` = '$subId'");
    if($update){
        ?>
        <script>
            alert("Coordinator Updated Successfully");
            window.open("subjects.php","_self");
        </script>
        <?php
    }
}
if(isset($_GET['coordinator'])){
    updateCoordinator($con,$_GET['subjectId'],$_GET['coordinator']);
}
else if(!isset($_GET['subjectId'])) {
    echo "<script>window.open('subjects.php','_self')</script>";
}
else{
    $subId = $_GET['subjectId']; 
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
</head>

<style>
    * {
        font-family: poppins;
    }
</style>

<body>

    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>
                <h1 class="h1 fw-bold">Change Coordinator</h1>
                <hr class="hr">
            </header>
            <form action="<?php echo htmlspecialchars("change coordinator.php")?>" method="get">
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Subject Id</h4>
                    <input class="form-control disabled" value="<?php echo htmlspecialchars($subId)?>" disabled>
                    <input type="hidden" name="subjectId" value="<?php echo htmlspecialchars($subId)?>">
                </div>
                <div class="mb-3">
                    <h4 class="h4 fw-bold">Select Coordinator </h4>
                    <select name="coordinator" class="px-2 text-secondary border-secondary py-1 rounded-2 shadow-none border border-2 w-100" required>
                        <?php
                        $coordinator = mysqli_fetch_all(mysqli_query($con, "SELECT `coordinator id` FROM `coordinator` ORDER BY `id` ASC"),MYSQLI_ASSOC);
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
                <div>
                    <button name="submit" class="btn btn-dark shadow-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
}
?>