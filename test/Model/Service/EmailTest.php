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
        $configArray = require(__DIR__ . '/../../../config/autoload/local.php');

        $this->emailService = new EmailService\Email(
            $configArray['email']['username'],
            $configArray['email']['password']
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EmailService\Email::class,
            $this->emailService
        );
    }
}
