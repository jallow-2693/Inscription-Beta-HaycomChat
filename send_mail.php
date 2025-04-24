<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.html?error=1");
        exit();
    }

    $to = "contact.haycom@gmail.com";
    $subject = "Nouvelle demande de bêta";
    $message = "Adresse email : $email";
    $headers = "From: noreply@haycomchat.com";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: index.html?success=1");
    } else {
        header("Location: index.html?error=1");
    }
    exit();
}
?>
