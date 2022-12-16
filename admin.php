<?php
session_start();

require_once "config.php";
require_once "db_conn.php";
$connection = databaseConnect();
    if(!isset($_SESSION['id'])){
        header("location: index.php");
        exit();
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<a href="logout.php" class="btn btn-primary">Log out</a>
<a href="json.php" class="btn btn-primary">Update JSON FILE</a>
<a href="data.json" class="btn btn-primary" download>Download JSON FILE</a>
<h1>ALL WORDS</h1>
<table id="example" class="display" style="width:100%"></table>

<div style="display: flex; justify-content: space-evenly">
    <form action="insertNewWord.php" method="post">
        <h2>Add new word!</h2>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Eng</span>
            <input name="Eng" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
                        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Srb</span>
            <input name="Srp" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
    <form action="deleteWord.php" method="post">
        <h2>Delete word!</h2>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Word ID</span>
            <input type="text" name="Id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
<script src='https://code.jquery.com/jquery-3.6.1.min.js' integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=' crossorigin='anonymous'></script>
<script src='https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js'></script>
<script>
    $(document).ready(function () {
        var t = $('#example').DataTable({
            ajax: 'allWords.php',
            columns: [
                { title: 'Id' },
                { title: 'Eng' },
                { title: 'Srp' },
                { title: 'Len Eng' },
                { title: 'Len Srp' },
            ],

        });

    });


</script>


</body>
</html>