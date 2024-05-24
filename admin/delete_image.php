<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_POST['filename'];
    $filePath = '../image/' . $filename;

    if (file_exists($filePath)) {
        unlink($filePath);
        echo "Image deleted successfully.";
    } else {
        echo "Error: File not found.";
    }
}
header("Location: upload_qoutes.php");
?>
