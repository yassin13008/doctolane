<?php

namespace ContainerDDXHjNx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_B5_AQsqService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.b5.aQsq' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.b5.aQsq'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appointment' => ['privates', '.errored..service_locator.b5.aQsq.App\\Entity\\Appointment', NULL, 'Cannot autowire service ".service_locator.b5.aQsq": it needs an instance of "App\\Entity\\Appointment" but this type has been excluded in "config/services.yaml".'],
            'appointmentRepository' => ['privates', 'App\\Repository\\AppointmentRepository', 'getAppointmentRepositoryService', true],
            'aviaRepo' => ['privates', 'App\\Repository\\AviabilityRepository', 'getAviabilityRepositoryService', true],
        ], [
            'appointment' => 'App\\Entity\\Appointment',
            'appointmentRepository' => 'App\\Repository\\AppointmentRepository',
            'aviaRepo' => 'App\\Repository\\AviabilityRepository',
        ]);
    }
}
