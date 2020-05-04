<?php
namespace LeoGalleguillos\Email\Model\Service;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public function __construct(
        $host,
        $username,
        $password
    ) {
        $this->host      = $host;
        $this->username  = $username;
        $this->password  = $password;
    }

    /**
     * @return bool
     */
    public function send(
        $fromAddress,
        $fromName,
        $toAddress,
        $toName,
        $subject,
        $bodyHtml = null,
        $bodyText,
        $bccEmail = null,
        $bccName = null
    ) {
        return mail($toAddress, 'subject', 'message');
        $this->phpMailer->setFrom($fromAddress, $fromName);
        $this->phpMailer->AddAddress($toAddress, $toName);

        if ($bccEmail && $bccName) {
            $this->phpMailer->AddBCC(
                $bccEmail,
                $bccName
            );
        }
        $this->phpMailer->Subject = $subject;

        if ($bodyHtml) {
            $this->phpMailer->isHTML(true);
            $this->phpMailer->Body = $bodyHtml;
            $this->phpMailer->AltBody = $bodyText;
        } else {
            $this->phpMailer->isHTML(false);
            $this->phpMailer->Body = $bodyText;
        }

        return $this->phpMailer->send();
    }

    private function getPhpMailer()
    {
        $phpMailer = new PHPMailer();

        $phpMailer->Host       = $this->host;
        $phpMailer->Username   = $this->username;
        $phpMailer->Password   = $this->password;
        $phpMailer->IsSMTP();
        $phpMailer->CharSet = 'UTF-8';
        $phpMailer->SMTPDebug  = 0;
        $phpMailer->SMTPSecure = 'ssl';
        $phpMailer->SMTPAuth   = true;
        $phpMailer->Port       = 465;

        return $phpMailer;
    }
}
