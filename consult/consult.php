<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consult page</title>
    <link rel="stylesheet" type="text/css" href="../css/Custom.css">
</head>
<body class="bg1">
    <div id="container">
        <ul id="menu">
            <li><a href="../main.php">Home</a></li>
            <li><a href="../watch/watch.php" class="active">Watch</a></li>
            <li><a href="../quotes/quotes.php">Quotes</a></li>
            <li><a href="../AskUser/AskUser.php">Chat</a>
                <ul>
                    <li><a href="consult.php">Consult</a></li>
                </ul>
            </li>
            <li><a href="../about/about.php">About</a></li>
            <li><a href="../register/logout.php" class="signout">Sign out</a>
            <ul>
                <li><a href="../admin/admin_login.php">Admin</a></li>
            </ul>
            </li>
        </ul>
    </div>
    <div class="container_con">
        <h2>Recommended Consultations</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Services</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Facebook</th>
                <th>Website</th>
                <th>Book Appointment</th>
            </tr>
            <?php
            // Load the XML file
            $xmlFile = 'D:\Xampp\htdocs\IPT\consult\consultations.xml';
            if (file_exists($xmlFile)) {
                $xml = simplexml_load_file($xmlFile);
                // Check if XML is loaded successfully
                if ($xml !== false) {
                    foreach ($xml->consult as $consult) {
                        echo "<tr>";
                        echo "<td>" . $consult->name . "</td>";
                        echo "<td>" . $consult->services . "</td>";
                        echo "<td>" . $consult->location . "</td>";
                        echo "<td>" . $consult->phone . "</td>";
                        echo "<td>" . $consult->email . "</td>";
                        echo "<td>" . $consult->facebook . "</td>";
                        echo "<td>" . $consult->website . "</td>";
                        echo "<td>" . $consult->book_appointment . "</td>";
                        echo "</tr>";
                    }
                } else {
                        echo "<p>No consultations available.</p>";
                    }
            } else {
                echo "<tr><td colspan='7'>Consultations file not found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
