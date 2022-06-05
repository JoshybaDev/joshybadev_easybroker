<?php
namespace JoshybaDev\EasyBroker;
class MlsProperties{
    private $EndPoint = '/mls_properties';
    private ApiClient $api_client;
    public function __construct(ApiClient $api_client)
    {
        $this->api_client=$api_client;
    }
    public function find($publi_id)
    {
        $response = $this->api_client->get("$this->EndPoint/$publi_id");
        return json_decode($response,true);
    }
    public function search($query=[])
    {
        $stored_query = new Query($this->api_client,$this->EndPoint,$query);
        return new PaginatedResponse($stored_query);
    }     
}