<?php
namespace LeoGalleguillos\Email;

use LeoGalleguillos\Email\Model\Factory as EmailFactory;
use LeoGalleguillos\Email\Model\Service as EmailService;
use LeoGalleguillos\Email\Model\Table as EmailTable;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                EmailService\Email::class => function ($serviceManager) {
                    $config = $serviceManager->get('Config');
                    return new EmailService\Email(
                        $config['email']['host'],
                        $config['email']['username'],
                        $config['email']['password']
                    );
                },
            ],
        ];
    }
}
