<?php

namespace Controllers;

use Interop\Container\ContainerInterface;

class Kerio
{
    protected $ci;
    
    protected $kerioConfig;

    //C	onstructor
    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
        $this->kerioConfig = new \Models\KerioConfigModel($this->ci['settings']['kerio']['servicename'], $this->ci['settings']['kerio']['serviceorganization'], $this->ci['settings']['kerio']['serviceversion'], $this->ci['settings']['kerio']['host'], $this->ci['settings']['kerio']['user'], $this->ci['settings']['kerio']['pass']);
    }
    public function getUsers($req, $res, $args)
    {
        $model = new \Models\Kerio($this->kerioConfig);
        
        $res = $res->withJson($model->getUsers());
        
        return $res;
    }
    public function addUser($req, $res, $args)
    {
        $model = new \Models\Kerio($this->kerioConfig);
        $payload = $req->getParsedBody();
        try {
            $newUser = $model->addUser('tilli', 'Tilmann Bach', 'test', 'tilli14@msn.com');
            $res = $res->withJson($newUser);
        } catch (\KerioApiException $e) {
            $res = $res->withJson(['error'=>$e->getCode(), 'message'=>$e->getMessage()]);
        }
        return $res;
    }
}
