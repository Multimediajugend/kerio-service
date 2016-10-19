<?php

namespace Models;

class KerioConfigModel
{
    public $apiName;
    public $apiOrganization;
    public $apiVersion;

    public $kerioIpAdress;
    public $kerioUsername;
    public $kerioPassword;

    public function __construct($apiName, $apiOrganization, $apiVersion, $kerioIpAdress, $kerioUsername, $kerioPassword)
    {
        $this->apiName = $apiName;
        $this->apiOrganization = $apiOrganization;
        $this->apiVersion = $apiVersion;
        $this->kerioIpAdress = $kerioIpAdress;
        $this->kerioUsername = $kerioUsername;
        $this->kerioPassword = $kerioPassword;
    }
}
