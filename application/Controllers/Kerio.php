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
        $kerioConfig = new \Models\KerioConfigModel('KerioWrapper', 'Organisation', '1.0', '192.168.2.111', 'admin', '*****');
        $model = new \Models\Kerio($kerioConfig);
        
        $res = $res->withJson($model->getUsers());
        
        if (isset($session)) {
            $api->logout();
        }

        return $res;
    }
}
