<?php

namespace Controllers;

use Interop\Container\ContainerInterface;

class Kerio
{
    protected $ci;
    
    protected $kerioConfig;

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
        if (!$payload || !isset($payload["username"]) || !isset($payload["fullname"]) || !isset($payload["password"]) || !isset($payload["email"])) {
            return $res->withStatus(400);
        }
        try {
            $newUser = $model->addUser(filter_var($payload["username"]), filter_var($payload["fullname"]), filter_var($payload["password"]), filter_var($payload["email"], FILTER_VALIDATE_EMAIL));
            $res = $res->withJson($newUser);
        } catch (\KerioApiException $e) {
            $res = $res->withJson(['error'=>$e->getCode(), 'message'=>$e->getMessage()])->withStatus(400);
        }
        return $res;
    }
}
