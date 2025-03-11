<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar la librería PHPMailer
require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $correo = htmlspecialchars($_POST['correo']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Limpiar el número de caracteres no numéricos para WhatsApp
    $telefono_url = urlencode(preg_replace('/\D/', '', $telefono));

    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.ionos.com';  // Servidor SMTP de IONOS
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Luis.villa@redinmb.com';  // Tu correo de IONOS
        $mail->Password   = 'Luis*Portal2025';  // Tu contraseña de correo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('Luis.villa@redinmb.com', 'Redinmobiliaria');  // Cambia según tu preferencia
        $mail->addAddress('Luis.villa@redinmb.com', 'Redinmobiliaria');  // Correo destino

        // Agregar una imagen incrustada, si es necesario
        $mail->addEmbeddedImage('../Recursos/Red-inmobiliaria.png', 'logo_redinmobiliaria'); // Ruta del logo local

        // Asunto
        $mail->Subject = 'Nuevo Mensaje de Contacto';

        // Cuerpo del mensaje (HTML)
        $mail->isHTML(true);  // Asegurarse de que el correo sea enviado en formato HTML
        $mail->Body = '
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="cid:Red-inmobiliaria" alt="Logo Redinmobiliaria" style="max-width: 150px;">
            <h2 style="color:rgb(147, 49, 49); margin: 10px 0;">Nuevo Mensaje de Contacto</h2>
        </div>
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr>
                <th style="text-align: left; padding: 10px; border: 1px solid #ddd; background-color:rgb(0, 0, 0); color: #fff;">Cliente</th>
                <th style="text-align: left; padding: 10px; border: 1px solid #ddd; background-color:rgb(0, 0, 0); color: #fff;">Datos</th>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Nombre Completo</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . $nombre . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Correo Electrónico</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . $correo . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Teléfono</td>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    <a href="https://wa.me/' . $telefono_url . '" target="_blank">' . $telefono . '</a>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Mensaje</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . $mensaje . '</td>
            </tr>
        </table>
        ';

        // Enviar el correo
        $mail->send();

        // Mostrar mensaje de éxito con SweetAlert
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Mensaje Enviado!',
                text: 'Gracias por contactarnos. Nos pondremos en contacto contigo pronto.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location.href = 'propiedades.php'; // Redirigir a la página principal
            });
        });
        </script>";
    } catch (Exception $e) {
        // Mostrar mensaje de error con SweetAlert
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error al Enviar',
                text: 'Hubo un problema al enviar el correo. Error: {$mail->ErrorInfo}',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        });
        </script>";
    }
}
?>
