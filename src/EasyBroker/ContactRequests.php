<?php
namespace JoshybaDev\EasyBroker;
class ContactRequests
{
    private $EndPoint = '/contact_requests';
    private ApiClient $api_client;
    public function __construct(ApiClient $api_client)
    {
        $this->api_client=$api_client;
    }   
    public function search($query=[])
    {
        $stored_query = new Query($this->api_client,$this->EndPoint,$query);
        return new PaginatedResponse($stored_query);
    }
    public function create($body)
    {
        return $this->api_client->post($this->EndPoint,$body);
    } 
}
