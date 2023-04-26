<?php

namespace ContainerUZoBewN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_5jFsnf2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.5jFsnf2' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.5jFsnf2'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'repoPatient' => ['privates', 'App\\Repository\\PatientsRepository', 'getPatientsRepositoryService', true],
            'userPasswordHasher' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
        ], [
            'entityManager' => '?',
            'repoPatient' => 'App\\Repository\\PatientsRepository',
            'userPasswordHasher' => '?',
        ]);
    }
}