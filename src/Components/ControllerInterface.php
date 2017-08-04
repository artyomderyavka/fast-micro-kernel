<?php
/**
 * Created by PhpStorm.
 * Date: 03.08.2017
 * Time: 17:15
 */


namespace FastMicroKernel\Components;


use Psr\Container\ContainerInterface;
use GuzzleHttp\Psr7\Response;

interface ControllerInterface {

    /**
     * @return mixed
     */
    public function getContainer(): ContainerInterface;

    /**
     * @param int $status
     * @param \StdClass $responseDataObject
     * @return Response
     */
    public function buildJsonResponse(int $status, \StdClass $responseDataObject): Response;
}