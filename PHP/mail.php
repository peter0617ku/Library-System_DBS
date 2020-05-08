
<?php
    #$to="peter0617ku@gmail.com";
    #$subject="這是測試郵件的標題";
    #$massage="測試郵件的內容";
    #$headers="header??";
    #mail($to,$subject,$message,$headers);
?>


<?php

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "465");
ini_set("sendmail_from", "peter0617ku@gmail.com");


$to_email = "peter0617ku@gmail.com";
$subject = "主旨";
$body = "信件內文";
$headers = "From: super star";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>