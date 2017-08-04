<?php
/**
 * Created by PhpStorm.
 * Date: 04.08.2017
 * Time: 15:58
 */

namespace FastMicroKernel\Components;


class ServiceClientsFactory
{
    public static function getServiceClient(string $transport, string $servicePrefix): ServiceClientInterface
    {
        switch ($transport) {
            case 'local' :
                return new ServiceClientLocal($servicePrefix);
            case 'rest' :
                return new ServiceClientRest($servicePrefix);
            default :
                exit("Rest client wrong transport {$transport}");
        }
    }
}