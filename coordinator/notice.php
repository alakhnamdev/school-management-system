<?php
include '../connection/connector.php';
include "../sidebar/sidebar crd.php";
if(isset($_GET['subject'])){
    $subject = $_GET['subject'];
    $body = $_GET['body'];
    $createNotice = mysqli_query($con,"INSERT INTO `notice`(`subject`,`body`) VAlUE ('$subject','$body')");
    if($createNotice){
        ?>
        <script>
            alert("Notice Posted");
            window.open( "./","_self");
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
            <form action="<?php echo htmlspecialchars("create notice.php")?>" method="get">
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Subject</h6>
                    <input class="form-control shadow-none p-3" name="subject" value="" placeholder="subject" required>
                </div>
                <div class="mb-3">
                    <h6 class="h6 fw-bold">Body</h6>
                    <textarea class="form-control shadow-none p-3" name="body" style="height:250px; resize:none;" value="" placeholder="body" required></textarea>
                </div>
                <div>
                    <button name="submit" class="btn btn-dark shadow-none p-3 px-5">Post</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>