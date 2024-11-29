<?php include "../sidebar/sidebar crd.php";?>
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

<body>
    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>
                <h3 class="h3 fw-bold">Update Academics</h3>
                <hr class="hr">
            </header>
            <div class="">
                <h6 class="fw-bold">Select Class</h6>
                <div>
                <select id="cls" class="text-secondary p-2 rounded-2 shadow-none" >
                    <?php
                    include '../connection/connector.php';
                    $user = $_SESSION['username'];
                    $subject = mysqli_fetch_assoc(mysqli_query($con,"SELECT `subject id` FROM `coordinator` WHERE `coordinator id`='$user'"));
                    $subject = $subject['subject id'];
                    $classes = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `class and subjects`"),MYSQLI_ASSOC);
                    foreach($classes as $cls){
                        if(in_array($subject,$cls)){
                            ?>
                            <option value="<?php echo htmlspecialchars($cls['class'])?>"><?php echo htmlspecialchars($cls['class'])?></option>
                            <?php
                        }
                    }
                    ?>
                </select><br>
                <button class="btn btn-dark shadow-none my-2" onclick="updateAttendance(this)">Open Attendance</button>
                </div>                
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function getClass(){
            let cls = document.getElementById('cls').value;
            return cls;
        }
        let updateAttendance = e =>{
            let cls =getClass();
            window.open(`update attendance.php?class=${cls}`,"_self");
        }
    </script>
</body>

</html>