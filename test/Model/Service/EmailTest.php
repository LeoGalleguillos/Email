<?php
namespace LeoGalleguillos\EmailTest\Model\Service;

use LeoGalleguillos\Email\Model\Entity as EmailEntity;
use LeoGalleguillos\Email\Model\Factory as EmailFactory;
use LeoGalleguillos\Email\Model\Service as EmailService;
use LeoGalleguillos\Email\Model\Table as EmailTable;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    protected function setUp()
    {
        $this->config = require(__DIR__ . '/../../../config/autoload/local.php');

        $this->emailService = new EmailService\Email(
            $this->config['email']['host'],
            $this->config['email']['username'],
            $this->config['email']['password']
        );
    }

    public function testSend()
    {
        $response = $this->emailService->send(
            $this->config['email']['test']['from_email'],
            $this->config['email']['test']['from_name'],
            $this->config['email']['test']['to_email'],
            $this->config['email']['test']['to_name'],
            'this is the subject',
            null,
            'this is the message',
            $this->config['email']['test']['bcc_email'],
            $this->config['email']['test']['bcc_name']
        );

        $this->assertTrue($response);
    }
}
