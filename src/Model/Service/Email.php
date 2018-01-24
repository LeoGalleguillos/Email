<?php
namespace LeoGalleguillos\Email\Model\Service;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public function __construct(
        $username,
        $password
    ) {
        $this->username  = $username;
        $this->password  = $password;
        $this->phpMailer = $this->getPhpMailer();
    }

    public function send(
        $fromAddress,
        $fromName,
        $toAddress,
        $toName,
        $subject,
        $bodyHtml = null,
        $bodyText
    ) {
        $this->phpMailer->setFrom($fromAddress, $fromName);
        $this->phpMailer->AddAddress($toAddress, $toName);
        // $this->phpMailer->AddBCC('leo.galleguillos@icloud.com', 'Leo Galleguillos');
        $this->phpMailer->Subject = $subject;

        if ($bodyHtml) {
            $this->phpMailer->isHTML(true);
            $this->phpMailer->Body = $bodyHtml;
            $this->phpMailer->AltBody = $bodyText;
        } else {
            $this->phpMailer->isHTML(false);
            $this->phpMailer->Body = $bodyText;
        }

        $this->phpMailer->send();
    }

    private function getPhpMailer()
    {
        $phpMailer = new PHPMailer();
        $phpMailer->IsSMTP();
        $phpMailer->CharSet = 'UTF-8';

        $phpMailer->Host       = 'smtp.gmail.com'; // SMTP server example
        $phpMailer->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
        $phpMailer->SMTPSecure = 'tls';
        $phpMailer->SMTPAuth   = true;                  // enable SMTP authentication
        $phpMailer->Port       = 587;                    // set the SMTP port for the GMAIL server
        $phpMailer->Username   = $this->username; // SMTP account username example
        $phpMailer->Password   = $this->password;        // SMTP account password example
        return $phpMailer;
    }
}
