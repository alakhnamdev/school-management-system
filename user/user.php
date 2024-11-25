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
    * {
        font-family: poppins;
    }
</style>

<body>
    <div class="p-3">
        <div class="p-3 rounded-4 border border-2">
            <table class="table caption-top">
                <caption class="h1 fw-bold">Users</caption>
                <thead class="table-light">
                    <tr>
                        <th>Select Users</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>
                            <button class="btn border-0"><a class="btn btn-dark shadow-none text-decoration-none text-light" href="./manage users.php?user=student">Students</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn border-0"><a class="btn btn-dark shadow-none text-decoration-none text-light" href="./manage users.php?user=coordinator">Coordinators</a></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>