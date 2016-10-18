<?php

namespace Controllers\Kerio;

use Interop\Container\ContainerInterface;

class KerioWrapper
{
    protected $ci;
    
    //C	onstructor
    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }
    public function getUsers($req, $res, $args)
    {
        $api = new \KerioControlApi('KerioWrapper', 'Organisation', '1.0');
        $session = $api->login('192.168.2.111', 'admin', '******');
        $params = array(
          "query" => array(
              "start" => 0,
              "limit" => -1,
              "orderBy" => array(array(
                  "columnName" => "name",
                  "direction" => "Asc"
              ))
           ),
           "domainId" => "local"
        );
        
        $users = $api->sendRequest("Users.get", $params);

        $res = $res->withJson($users);
        
        if (isset($session)) {
            $api->logout();
        }

        return $res;
    }
}
