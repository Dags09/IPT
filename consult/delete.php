<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $idToDelete = $_POST["id"];

    // Load the XML file
    $xmlFile = 'D:\Xampp\htdocs\IPT\consult\consultations.xml';
    $xml = new DOMDocument();
    $xml->load($xmlFile);

    // Find the consult with the given ID
    $consults = $xml->getElementsByTagName('consult');
    foreach ($consults as $consult) {
        $id = $consult->getAttribute('id');
        if ($id == $idToDelete) {
            // Remove the consult
            $consult->parentNode->removeChild($consult);
            break;
        }
    }

    // Save the changes to the XML file
    $xml->save($xmlFile);

    // Redirect back to consult.php
    header("Location: ..\admin\add_new_consult.php");
    exit();
} else {
    exit();
}
?>
