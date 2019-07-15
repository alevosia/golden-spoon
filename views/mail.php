<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer-master/src/Exception.php'; // If you want to debug
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer-master/src/PHPMailer.php'; // Only file you REALLY need
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer-master/src/SMTP.php';
    
    
    if (isset($_POST['g-recaptcha-response'])) {
        
        if (isset($_POST['firstname']) && isset($_POST['lastname'])
            && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
        {
            $user_firstname = trim(strip_tags($_POST['firstname']));
            $user_lastname = trim(strip_tags($_POST['lastname']));
            $user_email = trim(strip_tags($_POST['email']));
            $user_subject = trim(strip_tags($_POST['subject']));
            $user_message = trim(strip_tags($_POST['message']));
            $user_ip = trim(strip_tags($_SERVER['REMOTE_ADDR']));
            
            $email_from = "contact@goldenspoon.ph";
            $email_subject = "Golden Spoon - " . $user_subject;
            $email_body = "Full Name: $user_firstname $user_lastname \n\n" .
                          "Message:\n" . $user_message;
            
            $secretKey = "6LeWIq0UAAAAAMlQQALV_BCGf--MB66eKb9lpUfd";
            $responseToken = $_POST['g-recaptcha-response'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseToken";
            
            $response = file_get_contents($url);
            $response = json_decode($response);
            
            if ($response->success) {
                try {
                    
                    /*
                    //Server settings
                    $mail->SMTPDebug = 3;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host = 'ssl://smtp.gmail.com:465';                       // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = $email_from;                            // SMTP username
                    $mail->Password   = 'AlEx@nd#r24';                         // SMTP password
                    /*
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to
                    */
                    
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;
                    
                    $send_using_config = 1; // set to 1, 2, etc. to test different settings
                    switch ($send_using_config):
                        case 1:
                            $mail->Host = 'localhost';
                            $mail->Port = 25;
                            $mail->SMTPSecure = FALSE;
                            $mail->SMTPAuth = FALSE;
                            $mail->SMTPAutoTLS = FALSE;
                            break;
                        case 2:
                            # Host amnd Port info obtained from:
                            #   Godaddy > cPanel Home > Email > cPanel Email > Mail Configuration > "Secure SSL/TLS Settings" > Outgoing Server
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 465;
                            $mail->SMTPSecure = 'ssl';
                            $mail->SMTPAuth = FALSE;
                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                'verify_peer' => FALSE,
                                'verify_peer_name' => FALSE,
                                'allow_self_signed' => TRUE
                                )
                            );
                            break;
                    endswitch;
                    
                    $mail->Username   = $email_from;                            // SMTP username
                    $mail->Password   = '=Lq)xq3J.by=';                         // SMTP password
                
                    //Recipients
                    $mail->setFrom($email_from);
                    $mail->addAddress('wellness@goldenspoon.ph');
                    $mail->addBCC('alexanderpaul.marinas@gmail.com');
                    $mail->addBCC('simmerstudios.co@gmail.com');
                    $mail->addReplyTo($user_email);
                
                    // Content
                    $mail->Subject = $email_subject;
                    $mail->Body    = $email_body;
                
                    $mail->send();
                    
                    echo 'passed';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "failed";
            }
            
        } else {
            echo "missing";
        }
    }
?>