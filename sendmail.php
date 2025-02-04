<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = htmlspecialchars($_POST["nume"]);
    $email = htmlspecialchars($_POST["email"]);
    $mesaj = htmlspecialchars($_POST["mesaj"]);

    $to = "vasi37v@yahoo.com";  // Adresa ta de email
    $subject = "Mesaj nou de pe site";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Ai primit un mesaj nou de pe site-ul tău:\n\n";
    $body .= "Nume: $nume\n";
    $body .= "Email: $email\n";
    $body .= "Mesaj:\n$mesaj\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mesaj trimis cu succes!";
    } else {
        echo "Eroare la trimiterea mesajului!";
    }
} else {
    echo "Acces nepermis!";
}
?>
