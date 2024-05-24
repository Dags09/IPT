<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New Consult</title>
	<link rel="stylesheet" type="text/css" href="../css/add_new_consult_custom.css">
</head>
<body>
<div class="main_cont">
	<div class="container">
    <a href="admin.php">Back</a><br><br>
    <form action="..\consult\process.php" method="post">
    <div class="text">
      Add New Consult
    </div>
      <div class="form-row">
        <div class="input-data">
          <input type="text" name="name" id="name" required>
          <div class="underline"></div>
          <label for="name">Name of School or Company:</label>
        </div>
        <div class="input-data">
          <input type="text" name="services" id="services" required>
          <div class="underline"></div>
          <label for="services">Services:</label>
        </div>
      </div>
      <div class="form-row">
        <div class="input-data">
          <input type="text" name="location" id="location" required>
          <div class="underline"></div>
          <label for="location">Location:</label>
        </div>
        <div class="input-data">
          <input type="text" name="phone" id="phone" required>
          <div class="underline"></div>
          <label for="phone">Phone Number:</label>
        </div>
      </div>
      <div class="form-row">
        <div class="input-data">
          <input type="email" name="email" id="email" required>
          <div class="underline"></div>
          <label for="email">Email:</label>
        </div>
        <div class="input-data">
          <input type="text" name="facebook" id="facebook" required>
          <div class="underline"></div>
          <label for="facebook">Facebook:</label>
        </div>
      </div>
      <div class="form-row">
        <div class="input-data">
          <input type="text" name="website" id="website" required>
          <div class="underline"></div>
          <label for="website">Website:</label>
        </div>
        <div class="input-data">
          <input type="text" name="book_appointment" id="book_appointment" required>
          <div class="underline"></div>
          <label for="book_appointment">Book Appointment:</label>
        </div>
      </div>
      <div class="form-row submit-btn">
        <div class="input-data">
        <div class="inner"></div>
          <input type="submit" value="submit">
        </div>
      </div>
    </form><br><br>
      <div class="addconsult">
        <h2>List of consultations:</h2><br>
        <?php
        // Load the XML file
        $xmlFile = 'D:\Xampp\htdocs\IPT\consult\consultations.xml';
        $xml = new DOMDocument();
        $xml->load($xmlFile);

        // Get all consult elements
        $consults = $xml->getElementsByTagName('consult');

        // Check if there are any consults
        if ($consults->length > 0) {
            echo '<ul>';
            foreach ($consults as $consult) {
                $id = $consult->getAttribute('id');
                $name = $consult->getElementsByTagName('name')->item(0)->nodeValue;
                $services = $consult->getElementsByTagName('services')->item(0)->nodeValue;
                $location = $consult->getElementsByTagName('location')->item(0)->nodeValue;
                $phone = $consult->getElementsByTagName('phone')->item(0)->nodeValue;
                $email = $consult->getElementsByTagName('email')->item(0)->nodeValue;
                $facebook = $consult->getElementsByTagName('facebook')->item(0)->nodeValue;
                $website = $consult->getElementsByTagName('website')->item(0)->nodeValue;
                $book_appointment = $consult->getElementsByTagName('book_appointment')->item(0)->nodeValue;

                // Display consult details
                echo "<li>";
                echo "<strong>Name:</strong> $name <br><br>";
                echo "<strong>Services:</strong> $services <br><br>";
                echo "<strong>Phone:</strong> $phone <br><br>";
                echo "<strong>Email:</strong> $email <br><br>";
                echo "<strong>Facebook:</strong> $facebook <br><br>";
                echo "<strong>Website:</strong> $website <br><br>";
                echo "<strong>Book Appointment:</strong> $book_appointment <br><br>";
                echo "<form action='..\consult\delete.php' method='post'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='submit' name='delete' value='Delete' class='button-22'>";
                echo "</form><br>";
                echo "</li>";
            }
            echo '</ul>';
        } else {
            echo "<p>No consultations available.</p>";
        }
        ?>
      </div>
    </div>
</div>
</body>
</html>