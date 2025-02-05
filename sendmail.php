use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = htmlspecialchars($_POST["nume"]);
    $email = htmlspecialchars($_POST["email"]);
    $mesaj = htmlspecialchars($_POST["mesaj"]);

    $mail = new PHPMailer(true);
    try {
        // Configurare SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'contul_tau@gmail.com'; // Adresa Gmail
        $mail->Password = 'parola_aplicatie';  // Parola aplicației Gmail
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 

        // Expeditor și destinatar
        $mail->setFrom($email, $nume);
        $mail->addAddress('vasi37v@yahoo.com');  

        // Conținut e-mail
        $mail->isHTML(false);
        $mail->Subject = "Mesaj nou de pe site";
        $mail->Body = "Ai primit un mesaj nou de la:\n\n".
                      "Nume: $nume\n".
                      "Email: $email\n".
                      "Mesaj:\n$mesaj\n";

        // Trimite e-mail-ul
        $mail->send();
        echo "Mesaj trimis cu succes!";
    } catch (Exception $e) {
        echo "Eroare la trimitere: {$mail->ErrorInfo}";
    }
} else {
    echo "Acces nepermis!";
}
