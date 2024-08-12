<?php
require "settings/init.php";

// Handle image uploads
if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $files = $_FILES['rejsebillede'];

    foreach ($data['lokation'] as $index => $lokation) {
        if (!empty($files['tmp_name'][$index])) {
            $fileName = basename($files['name'][$index]); // Extract file name
            $filePath = "uploads/" . $fileName; // Define the file path

            // Move the uploaded file to the target directory
            if (move_uploaded_file($files['tmp_name'][$index], $filePath)) {
                $sql = "INSERT INTO rejser (lokation, rejsebillede) VALUES (:lokation, :rejsebillede)";
                $bind = [
                    ":lokation" => $lokation,
                    ":rejsebillede" => $fileName,
                ];

                $db->sql($sql, $bind, false);
            } else {
                echo "Failed to upload file: " . $fileName;
            }
        }
    }

    header('Location: Indsaet.php');
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

    <!-- JavaScript for confirmation -->
    <script>
        function confirmDelete(event) {
            if (!confirm('Er du sikker på, at du vil slette dette billede?')) {
                event.preventDefault(); // Prevent form submission if user cancels
            }
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row pb-2">
        <div class="col-12 header d-flex justify-content-center">
            <h1>Indsæt rejselokationer til din afstemning</h1>
        </div>
    </div>
</div>
<div class="col-12 justify-content-center text-center align-items-center">
    <h3>Indsæt op til 4 lokationer. Dit sidstvalgte "gem afstemning" vil være den afstemning, som ligger på din hjemmeside.</h3>
    <h2>Kun .jpg filer kan benyttes til upload af billeder</h2>
</div>
<div class="container form-container">
    <form method="post" action="Indsaet.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 mb-3">
                <label class="form-label" for="rejsebillede">Billede af rejselokation</label>
                <input type="file" class="form-control" id="rejsebillede" name="rejsebillede[]">
            </div>
            <div class="col-12 col-md-8 mb-3">
                <label class="form-label" for="lokation1">Lokation (Land, By)</label>
                <input class="form-control" type="text" name="data[lokation][]" id="lokation1" placeholder="Lokation" value="">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="rejsebillede2">Billede af rejselokation</label>
                <input type="file" class="form-control" id="rejsebillede2" name="rejsebillede[]">
            </div>
            <div class="col-12 col-md-8 mb-3">
                <label class="form-label" for="lokation2">Lokation (Land, By)</label>
                <input class="form-control" type="text" name="data[lokation][]" id="lokation2" placeholder="Lokation" value="">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="rejsebillede3">Billede af rejselokation</label>
                <input type="file" class="form-control" id="rejsebillede3" name="rejsebillede[]">
            </div>
            <div class="col-12 col-md-8 mb-3">
                <label class="form-label" for="lokation3">Lokation (Land, By)</label>
                <input class="form-control" type="text" name="data[lokation][]" id="lokation3" placeholder="Lokation" value="">
            </div>
            <div class="col-12 col-md-4 mb-3 d-flex justify-content-md-end">
                <button class="btn btn-primary btn-submit" type="submit" id="btnSubmit">Gem din afstemning hér</button>
            </div>
        </div>
    </form>
</div>

<!-- Display saved images and provide delete option -->
<div class="container mt-4">
    <h2>Uploaded Images</h2>
    <div class="row">
        <?php
        $sql = "SELECT id, lokation, rejsebillede FROM rejser";
        $images = $db->sql($sql, [], true);

        foreach ($images as $image) {
            $imagePath = 'uploads/' . $image->rejsebillede;
            echo '<div class="col-12 col-md-3 mb-3">';
            echo '<div class="card">';
            echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . htmlspecialchars($image->lokation) . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($image->lokation) . '</h5>';
            echo '<form method="post" action="delete.php" class="d-inline" onsubmit="confirmDelete(event)">';
            echo '<input type="hidden" name="id" value="' . $image->id . '">';
            echo '<button type="submit" class="btn btn-danger">Slet</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>