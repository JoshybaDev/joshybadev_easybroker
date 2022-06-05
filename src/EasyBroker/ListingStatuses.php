<?php
namespace JoshybaDev\EasyBroker;
class ListingStatuses
{
    private $EndPoint = '/listing_statuses';
    private ApiClient $api_client;
    function __construct(ApiClient $api_client)
    {
        $this->api_client=$api_client;
    }   
    public function search($query=[])
    {
        $stored_query = new Query($this->api_client,$this->EndPoint,$query);
        return new PaginatedResponse($stored_query);
    } 
}