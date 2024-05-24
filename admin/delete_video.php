<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_POST['filename'];
    $filePath = '../video/' . $filename;

    if (file_exists($filePath)) {
        unlink($filePath);
        echo "Video deleted successfully.";
    } else {
        echo "Error: File not found.";
    }
}
header("Location: upload_video.php");
?>
