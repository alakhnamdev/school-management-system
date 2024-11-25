<?php
include "../connection/connector.php";
function createSubject($con, $subject)
{
    $subCode = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subject` ORDER BY `id` DESC"));
    $subCode = $subCode['id']+1;
    $subCode = "SUB" . str_pad($subCode, 3, "0", STR_PAD_LEFT);
    $createSubjectQuery = "INSERT INTO `subject` (`subject id`,`subject name`) VALUES ('$subCode','$subject')";
    $createSubject = mysqli_query($con, $createSubjectQuery);
    if ($createSubject) {
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
</head>

<style>
    *{
        font-family: poppins;
    }
</style>

<body>
    <div class="p-3">
        <div class="p-3 border border-2 rounded-3">
            <table class="table caption-top">
                <caption class="h1 fw-bold">Create Subject</caption>
                <thead class="table-light">
                    <tr>
                        <th>Suject Id</th>
                        <th colspan="">Subject Name</th>
                        <th colspan="2">Select Coordinator</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <form action="<?php echo htmlspecialchars("create subject.php") ?>" method="post">
                        <tr>
                            <td>
                                <label for="subject id">
                                    <?php
                                    $subCode = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `subject` ORDER BY `id` DESC"));
                                    $subCode = $subCode['id']+1;
                                    $subCode = "SUB" . str_pad($subCode, 3, "0", STR_PAD_LEFT);
                                    echo $subCode;
                                    ?>                                   
                                </label>
                            </td>
                            <td>
                                <input type="text" name="subject" class="form-control shadow-none" placeholder="Subject Name" required>
                            </td>
                            <td>
                                <select name="coordinator" class="px-2 text-secondary border-secondary py-1 rounded-2 shadow-none border border-2">
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
                            </td>
                            <td>
                                <button class="btn btn-dark" name="submit">Create Subject</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>    
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>