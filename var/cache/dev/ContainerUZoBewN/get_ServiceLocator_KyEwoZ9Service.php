<?php

namespace ContainerUZoBewN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KyEwoZ9Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.kyEwoZ9' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.kyEwoZ9'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'mailer' => ['privates', 'mailer.mailer', 'getMailer_MailerService', true],
            'proRepo' => ['privates', 'App\\Repository\\ProfessionnalsRepository', 'getProfessionnalsRepositoryService', true],
        ], [
            'mailer' => '?',
            'proRepo' => 'App\\Repository\\ProfessionnalsRepository',
        ]);
    }
}