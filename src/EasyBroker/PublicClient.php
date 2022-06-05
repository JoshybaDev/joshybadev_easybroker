<?php
namespace JoshybaDev\EasyBroker;
class PublicClient{
    private ApiClient $api_client;
    public function __construct($headers,$base_uri,$logger = null)
    {
        $this->api_client= new ApiClient($headers,$base_uri,$logger);
    }
    public function properties()
    {
        return new Properties($this->api_client);
    }
    public function mls_properties()
    {
        return new MlsProperties($this->api_client);
    }    
    public function contact_requests()
    {
        return new ContactRequests($this->api_client);
    }     
    public function locations()
    {
        return new Locations($this->api_client);
    }     
}