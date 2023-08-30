<?php
// Configurar el envío de correo con SMTP
require 'vendor/autoload.php'; // Asegúrate de tener la librería PHPMailer instalada

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];

    // Configuración para el envío de correo usando SMTP
    $smtpHost = 'mail.agroberries.com.mx'; // Cambia esto al servidor SMTP que estés utilizando
    $smtpPort = 587; // Puerto del servidor SMTP
    $smtpUsuario = 'contacto@agroberries.com.mx'; // Tu usuario SMTP
    $smtpClave = 'contacto@agroberries.com.mx'; // Tu clave SMTP

    $destinatario = 'cdelosada@agroberriescapitalgroup.com'; // Correo de destino
    $destinatario = 'carrilloriveradanielalejandro1@gmail.com'; // Correo de destino
    $asunto = 'Nuevo mensaje desde el formulario de contacto';

    // Cuerpo del correo
    $mensaje = "Nombre: $nombre\n";
    $mensaje .= "Correo: $email\n";
    $mensaje .= "Teléfono: $telefono\n";
    $mensaje .= "Mensaje: $mensaje\n";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $smtpHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUsuario;
        $mail->Password   = $smtpClave;
        $mail->SMTPSecure = 'tls'; // Puede ser 'ssl' o 'tls'
        $mail->Port       = $smtpPort;

        // Remitente y destinatario
        $mail->setFrom($smtpUsuario, 'Agroberries Capital Group');
        $mail->addAddress($destinatario);

        // Contenido del correo
        $mail->isHTML(false);
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;

        // $mail->send();
        if ($mail->send()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $mail->ErrorInfo]);
        }
        // echo 'Mensaje enviado correctamente';
    } catch (Exception $e) {
        echo json_encode(["success" => false, "error" => $mail->ErrorInfo]);
    }
}
?>
