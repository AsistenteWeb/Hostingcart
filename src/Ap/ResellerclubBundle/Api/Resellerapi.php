<?php

namespace Ap\ResellerclubBundle\Api;

use Ap\ResellerclubBundle\Api\Interfaces\OperationInterface;

class Resellerapi
{
    private $curl;

    private $beginquery;
    private $rformat;

    private $query;

    protected $dataquery;
    protected $authorization;

    public function __construct($authuserid,  $apikey,  $test = null)
    {
        if ((strcmp($authuserid, "") == 0) or (strcmp($apikey, "") == 0)) {
            throw new \Exception('authuserid or apikey is required');
        } else {
            $this->authorization["auth-userid"] = urlencode($authuserid);
            $this->authorization["api-key"] = urlencode($apikey);
        }

        $this->is_test = $test ? "test." : "";

        $this->beginquery = "https://".$this->is_test."httpapi.com/api";

        $this->operation = "";

        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_VERBOSE, 1);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
    }

    /**
     * @param  OperationInterface $operation
     * @param  string             $extraQuery
     * @return $this
     */
    public function setOperation(OperationInterface $operation, $extraQuery = null)
    {
        $this->query =
            $this->beginquery.
            $operation->getRequestType().
            $operation->getOperation().
            ".json?".
            http_build_query($this->authorization, '', '&', PHP_QUERY_RFC3986).
            '&'.
            http_build_query($operation->getData(), '', '&', PHP_QUERY_RFC3986).
            ($extraQuery ? '&'.$extraQuery : null);

        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function exec()
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->query);

        return curl_exec($this->curl);
    }
}
