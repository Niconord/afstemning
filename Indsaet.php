<?php
require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

    if (!empty($file["rejsebillede"]["tmp_name"])) {
        move_uploaded_file($file["rejsebillede"]["tmp_name"], "uploads/" . basename($file["rejsebillede"]["name"]));
    }


    $sql = "INSERT INTO rejser (lokation, rejsebillede) VALUES(:lokation, :rejsebillede)";
    $bind = [
        ":lokation" => $data["lokation"],

        ":rejsebillede" => (!empty($file["rejsebillede"]["tmp_name"])) ? $file["rejsebillede"]["name"] : NULL,
    ];

    $db->sql($sql, $bind, false);
    header('location: Indsaet.php');
    exit;

}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Insert til database</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
<div class="container-fluid">
    <div class="row bg-secondary text-white pb-1">
        <div class="col-12 header d-flex justify-content-center">
            <h1>Indsæt rejselokationer til din afstemning</h1>
        </div>
    </div>
</div>


<form method="post" action="Indsaet.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <label class="form-label" for="rejsebillede">Billede af rejselokation</label>
            <input type="file" class="form-control" id="rejsebillede" name="rejsebillede">
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="lokation">Lokation (Land, By)</label>
                <input class="form-control" type="text" name="data[lokation]" id="lokation" placeholder="lokation" value="">
            </div>
        </div>
        <div class="col-12">
            <label class="form-label" for="rejsebillede">Billede af rejselokation</label>
            <input type="file" class="form-control" id="rejsebillede" name="rejsebillede">
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="lokation">Lokation (Land, By)</label>
                <input class="form-control" type="text" name="data[lokation]" id="lokation" placeholder="lokation" value="">
            </div>
        </div>
        <div class="col-12">
            <label class="form-label" for="rejsebillede">Billede af rejselokation</label>
            <input type="file" class="form-control" id="rejsebillede" name="rejsebillede">
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="lokation">Lokation (Land, By)</label>
                <input class="form-control" type="text" name="data[lokation]" id="lokation" placeholder="lokation" value="">
            </div>
        </div>
        <div class="col-12">
            <label class="form-label" for="rejsebillede">Billede af rejselokation</label>
            <input type="file" class="form-control" id="rejsebillede" name="rejsebillede">
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="lokation">Lokation (Land, By)</label>
                <input class="form-control" type="text" name="data[lokation]" id="lokation" placeholder="lokation" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 offset-md-6">
            <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Gem din afstemning hér</button>
        </div>
    </div>
</form>






<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>