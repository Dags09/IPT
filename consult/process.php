<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the XML file exists and is readable
    $xmlFile = 'D:\Xampp\htdocs\IPT\consult\consultations.xml';
    if (file_exists($xmlFile) && is_readable($xmlFile)) {
        $xml = new DOMDocument('1.0');
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;

        // Load the XML file
        $xml->load($xmlFile);

        // Check if the document has a root element
        if ($xml->documentElement === null) {
            // If the document is empty, create a root element
            $root = $xml->createElement('consults');
            $xml->appendChild($root);
        } else {
            // Get the existing root element
            $root = $xml->documentElement;
        }

        // Get the last consultation ID
        $lastConsultId = 0;
        $consultations = $xml->getElementsByTagName('consult');
        foreach ($consultations as $consultation) {
            $id = $consultation->getAttribute('id');
            $lastConsultId = max($lastConsultId, (int)$id);
        }

        // Increment the last ID to generate a new one
        $newConsultId = $lastConsultId + 1;

        // Create a new <consult> element
        $newConsult = $xml->createElement('consult');

        // Set the ID attribute
        $newConsult->setAttribute('id', $newConsultId);

        // Create child elements for the <consult> element (assuming the same as before)
        $name = $xml->createElement('name', $_POST['name']);
        $newConsult->appendChild($name);

        $services = $xml->createElement('services', $_POST['services']);
        $newConsult->appendChild($services);

        $location = $xml->createElement('location', $_POST['location']);
        $newConsult->appendChild($location);

        $phone = $xml->createElement('phone', $_POST['phone']);
        $newConsult->appendChild($phone);

        $email = $xml->createElement('email', $_POST['email']);
        $newConsult->appendChild($email);

        $facebook = $xml->createElement('facebook', $_POST['facebook']);
        $newConsult->appendChild($facebook);

        $website = $xml->createElement('website', $_POST['website']);
        $newConsult->appendChild($website);

        $book_appointment = $xml->createElement('book_appointment', $_POST['book_appointment']);
        $newConsult->appendChild($book_appointment);
        // Append the <consult> element to the root element
        $root->appendChild($newConsult);

        // Save the changes to the XML file
        $xml->save($xmlFile);

        // Redirect to the consult.php page
        header("Location: consult.php");
        exit();
    } else {
        // Handle error if the XML file doesn't exist or is not readable
        echo "Error: Consultations XML file is missing or not readable.";
        // You can choose to exit the script or take appropriate action here
    }
}
?>
