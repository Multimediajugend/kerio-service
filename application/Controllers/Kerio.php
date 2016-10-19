<?php

namespace Controllers;

use Interop\Container\ContainerInterface;

class Kerio
{
    protected $ci;
    
    //C	onstructor
    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }
    public function getUsers($req, $res, $args)
    {
        $kerioConfig = new \Models\KerioConfigModel($this->ci['settings']['kerio']['servicename'], $this->ci['settings']['kerio']['serviceorganization'], $this->ci['settings']['kerio']['serviceversion'], $this->ci['settings']['kerio']['host'], $this->ci['settings']['kerio']['user'], $this->ci['settings']['kerio']['pass']);
        $model = new \Models\Kerio($kerioConfig);
        
        $res = $res->withJson($model->getUsers());
        
        if (isset($session)) {
            $api->logout();
        }

        return $res;
    }
}
