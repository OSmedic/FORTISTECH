<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Input data sanitization
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Email settings
    $to = "auerbach@fortistech.de"; // Updated to the specified destination address
    $subject = "Neue Nachricht vom Kontaktformular";
    $headers = "From: kontakt@fortistech.de\r\n"; // Your domain address as sender

    $email_content = "Name: $name\nE-Mail: $email\n\nNachricht:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Danke! Ihre Nachricht wurde erfolgreich gesendet.";
    } else {
        echo "Fehler: Die Nachricht konnte nicht gesendet werden.";
    }
} else {
    echo "Ungültige Anfrage.";
}
?>
