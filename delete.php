<?php
require "settings/init.php";

if (!empty($_POST["id"])) {
    $id = $_POST["id"];

    // Fetch the image details from the database
    $sql = "SELECT rejsebillede FROM rejser WHERE id = :id";
    $bind = [":id" => $id];
    $imageRecord = $db->sql($sql, $bind, true);

    if (!empty($imageRecord)) {
        $fileName = $imageRecord[0]->rejsebillede;
        $filePath = "uploads/" . $fileName;

        // Delete the file from the server
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the record from the database
        $sql = "DELETE FROM rejser WHERE id = :id";
        $db->sql($sql, $bind, false);

        echo "Image deleted successfully.";
    } else {
        echo "Image not found.";
    }
} else {
    echo "Invalid request.";
}

header('Location: Indsaet.php');
exit;
?>