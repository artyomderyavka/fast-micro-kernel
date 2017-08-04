<?php
/**
 * Created by PhpStorm.
 * Date: 03.08.2017
 * Time: 17:15
 */


namespace AdServer\Engine\Components;


use Psr\Container\ContainerInterface;

interface ControllerInterface {

    /**
     * @return mixed
     */
    public function getContainer(): ContainerInterface;
}