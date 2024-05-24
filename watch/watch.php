<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Watch page</title>
	<link rel="stylesheet" type="text/css" href="../css/Custom.css">
</head>
<body class="bg1">
	<div id="container">
        <ul id="menu">
            <li><a href="../main.php">Home</a></li>
            <li><a href="watch.php" class="active">Watch</a></li>
            <li><a href="../quotes/quotes.php" >Quotes</a></li>
            <li><a href="../AskUser/AskUser.php" >Chat</a>
                <ul>
                    <li><a href="../consult/consult.php" >Consult</a>
                </ul>
            </li>
            <li><a href="../about/about.php">About</a></li>
            <li><a href="../register/logout.php" class="signout">Sign out</a>
            <ul>
                <li><a href="../admin/admin_login.php" >Admin</a>
            </ul>
            </li>
        </ul>
    </div>
    <div class="title">
        <h1>Watch Some Inpirational and Motivational Videos</h1>
    </div>
    <div class="row" id="motivational_message">
             <?php
            // Directory where videos are stored
            $videoDir = "../video/";

            // Check if a new video has been uploaded
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["video"])) {
                $newVideo = $videoDir . basename($_FILES["video"]["name"]);
                if (move_uploaded_file($_FILES["video"]["tmp_name"], $newVideo)) {
                    // Video uploaded successfully
                    echo "<p>Video uploaded successfully</p><br><br>";
                } else {
                    // Error uploading video
                    echo "<h2>Error upload video</h2><br><br><br>";
                }
            }

            // Read all video files from the directory
            $videos = glob($videoDir . "*.mp4");

            // Display each video
            foreach ($videos as $video) {
                echo '<video width="240" height="400" controls>';
                echo '<source src="' . $video . '" type="video/mp4">';
                echo '</video>';
            }
            ?>
    </div>
</body>
</html>
