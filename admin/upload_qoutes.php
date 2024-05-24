<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Quotes</title>
	<link rel="stylesheet" type="text/css" href="../css/upload_custom.css">
	<script type="text/javascript" src=""></script>
</head>
<body>
<div class="Admin_upload">
	<div class="inner_container">
		<a href="admin.php">Back</a><br><br>
	    <h2>Upload New Quotes</h2>
	    <div class="upload">
	        <form action="upload.php" method="post" enctype="multipart/form-data">
	            <input type="file" name="fileToUpload" id="fileToUpload" multiple>
	            <p>Drag your files here or click in this area.</p>
	            <button type="submit" value="Upload Image" name="submit">Upload</button><br>
	        </form>
	    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	    <h2>Uploaded Images</h2>
	    <div class="uploaded-images">
	        <?php
	        $imageDir = '../image/';
	        if (is_dir($imageDir)) {
	            $images = array_diff(scandir($imageDir), array('.', '..'));
	            if (!empty($images)) {
	                echo '<ul>';
	                foreach ($images as $image) {
	                    echo '<li>';
	                    echo '<img src="' . $imageDir . $image . '" alt="' . $image . '">';
	                    echo '<form action="delete_image.php" method="post">';
	                    echo '<input type="hidden" name="filename" value="' . $image . '">';
	                    echo '<input type="submit" value="Delete" class="button-22">';
	                    echo '</form>';
	                    echo '</li>';
	                }
	                echo '</ul>';
	            } else {
	                echo "<p>No images uploaded.</p>";
	            }
	        }
	        ?>
	    </div>
	</div>
</div>
</body>
</html>