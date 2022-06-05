<?php
namespace JoshybaDev\EasyBroker;
/**
 * new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'))
 */
class EasyBroker
{
    private $base_uri = "";
    private $headers = "";

    public function __construct($ApiKey,$AppEnv)
    {
        $this->headers = DefaultHeaders($ApiKey);
        $this->base_uri = DefaultAPIRootUrl($AppEnv);
    }

    public function api_client($logger=null)
    {
        $ApiClient = new ApiClient($this->headers,$this->base_uri,$logger);
        return $ApiClient;
    }
    public function client($logger=null)
    {
        $PublicCliente =new PublicClient($this->headers,$this->base_uri,$logger);        
        return $PublicCliente;
    }
}