<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Video</title>
	<link rel="stylesheet" type="text/css" href="../css/upload_custom.css">
</head>
<body>
<div class="Admin_upload">
	<div class="inner_container">
		<a href="admin.php">Back</a><br><br>
			<h2>Upload Video</h2>
			<div class="upload">
				<form action="../watch/watch.php" method="post" enctype="multipart/form-data">
		            <input type="file" name="video" accept="video/mp4" multiple>
		            <p>Drag your files here or click in this area.</p>
		            <button type="submit" name="submit" value="Upload">Upload</button><br>
		        </form>
			</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	    <div class="uploaded-videos">
	    	<h2>Uploaded Videos</h2>
	        <?php
	        $videoDir = '../video/';
	        if (is_dir($videoDir)) {
	            $videos = array_diff(scandir($videoDir), array('.', '..'));
	            if (!empty($videos)) {
	                echo '<ul>';
	                foreach ($videos as $video) {
	                    echo '<li>';
	                    echo '<video width="320" height="240" controls>';
	                    echo '<source src="' . $videoDir . $video . '" type="video/mp4">';
	                    echo 'Your browser does not support the video tag.';
	                    echo '</video><br>';
	                    echo '<form action="delete_video.php" method="post">';
	                    echo '<input type="hidden" name="filename" value="' . $video . '">';
	                    echo '<input type="submit" value="Delete" class="button-22">';
	                    echo '</form>';
	                    echo '</li>';
	                }
	                echo '</ul>';
	            } else {
	                echo "<p>No videos uploaded.</p>";
	            }
	        }
	        ?>
	    </div>
	</div>
</div>
</body>
</html>