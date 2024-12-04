<?php include "../sidebar/sidebar.php";?><?php
include '../connection/connector.php';
if (isset($_GET['command'])){
    $notice = $_GET['noticeId'];
    $deleteNotice = mysqli_query($con, "DELETE FROM `notice` WHERE `id` = '$notice'");
    if ($deleteNotice) {
    ?>
        <script>
            alert("Notice Delete");
            window.open("./", "_self");
        </script>
    <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <header>
                <h3 class="h3 fw-bold">Post Notice</h3>
                <hr class="hr">
                </header>
            <?php 
            include '../connection/connector.php';
            $notices = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `notice` ORDER BY `id` DESC"),MYSQLI_ASSOC);
            foreach($notices as $notice){
                ?>                
                <div class="bg-white p-3 mb-3 rounded-3 border">
                    <div class="mb-2 d-flex">
                        <h6 class="h6 fw-bold">Date : <?php echo htmlspecialchars($notice['date'])?></h6>
                    </div>
                        <hr>
                    <div class="mb-2 d-flex">
                        <h6 class="h6 fw-bold">Subject : <?php echo htmlspecialchars($notice['subject'])?></h6>
                    </div>
                        <hr>
                    <div class="mb-2">
                        <div><?php echo htmlspecialchars($notice['body'])?></div>
                    </div>
                    <hr>
                    <div class="mb-2">
                        <div><a href="index.php?command=delete&noticeId=<?php echo urlencode($notice['id'])?>" class="text-decoration-none bg-danger text-light rounded-3 p-1 px-3 shadow-none">Delete</a></div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>