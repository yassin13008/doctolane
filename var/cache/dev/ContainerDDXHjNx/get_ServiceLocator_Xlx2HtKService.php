<?php

namespace ContainerDDXHjNx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Xlx2HtKService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Xlx2HtK' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Xlx2HtK'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'appointmentRepository' => ['privates', 'App\\Repository\\AppointmentRepository', 'getAppointmentRepositoryService', true],
            'patientRepo' => ['privates', 'App\\Repository\\PatientsRepository', 'getPatientsRepositoryService', true],
        ], [
            'appointmentRepository' => 'App\\Repository\\AppointmentRepository',
            'patientRepo' => 'App\\Repository\\PatientsRepository',
        ]);
    }
}
