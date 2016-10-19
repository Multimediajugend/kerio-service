<?php

namespace Models;

class Kerio
{
    protected $ci;
    protected $kerioConfig;
    protected $kerioApi;
    protected $kerioSession;
    
    public function __construct(KerioConfigModel $kerioConfig)
    {
        $this->kerioConfig = $kerioConfig;
        $this->kerioApi = new \KerioControlApi($this->kerioConfig->apiName, $this->kerioConfig->apiOrganization, $this->kerioConfig->apiVersion);
        $this->kerioSession = $this->kerioApi->login($this->kerioConfig->kerioIpAdress, $this->kerioConfig->kerioUsername, $this->kerioConfig->kerioPassword);
    }

    public function __destruct()
    {
        if (isset($this->kerioSession)) {
            $this->kerioApi->logout();
        }
    }

    public function getUsers()
    {
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
        $users = $this->kerioApi->sendRequest("Users.get", $params);
        return $users;
    }
}
