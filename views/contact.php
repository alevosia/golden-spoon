<?php
    function myExceptionHandler($exception) {
        echo "Exception: Failed to send.";
        die();
    }
    
    function myErrorHandler($errno, $errstr) {
        echo "Error: Failed to send.";
        die();
    }
    
    set_exception_handler('myExceptionHandler');
    set_error_handler('myErrorHandler');
    
    if (isset($_POST['g-recaptcha-response'])) {
        
        if (isset($_POST['firstname']) && isset($_POST['lastname'])
            && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
        {
            $user_firstname = $_POST['firstname'];
            $user_lastname = $_POST['lastname'];
            $user_email = $_POST['email'];
            $user_subject = $_POST['subject'];
            $user_message = $_POST['message'];
            $user_ip = $_SERVER['REMOTE_ADDR'];
            
            $email_from = "info@goldenspoon.ph";
            $email_subject = "Golden Spoon - $user_subject";
            $email_body = "Name: $user_firstname $user_lastname \n" .
                          "Message:\n.$user_message";
                        
            $email_to = "alexanderpaul.marinas@gmail.com";
            
            $headers =  "From: $email_from \r\n";
            $headers .= "Reply-To: $user_email \r\n";
            
            $secretKey = "6LeWIq0UAAAAAMlQQALV_BCGf--MB66eKb9lpUfd";
            $responseToken = $_POST['g-recaptcha-response'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseToken";
            
            $response = file_get_contents($url);
            $response = json_decode($response);
            
            if ($response->success) {
                try {
                    mail($email_to, $email_subject, $email_body, $headers);
                    echo "passed";
                } catch (Exception $e) {
                    echo "failed";
                }
            } else {
                echo "failed";
            }
        } else {
            echo "missing";
        }
    }
?>