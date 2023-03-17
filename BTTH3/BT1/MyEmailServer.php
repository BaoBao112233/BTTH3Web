<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include_once ("./EmailServerInterface.php");

    class MyEmailServer implements EmailServerInterface {
        public function sendEmail($to, $subject, $message) {
            $mail = new PHPMailer(true);
            try{
                // $mail->SMTPDebug = true;
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'kevinbao15072002@gmail.com'; // SMTP username
                $mail->Password = 'BaoBao15072002'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465; // TCP port to connect to
                $mail->setFrom($mail->Username,"bao");
                $mail->addAddress($to,"EmNotrym");
                $mail->isHTML(true);
                $mail->Body = $message;
                $mail->Subject = $subject;
                $mail->send();
                echo "Has sent mail!!";
            }catch (Exception $e){
                echo "Has not sent mail, Error: ($mail->ErrorInfo)";
            }
            
            
        }
    }
    
?>