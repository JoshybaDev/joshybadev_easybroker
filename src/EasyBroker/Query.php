<?php
namespace JoshybaDev\EasyBroker;
 class Query{
    private ApiClient $api_client;
    private $endpoint="",$query_params=[];
    public function __construct(ApiClient $api_client,$endpoint,$query_params)
    {
        $this->api_client=$api_client;
        $this->endpoint=$endpoint;
        $this->query_params=$query_params;
    }
    public function get($page = 1)
    {
        $getParams="?page=".$page."&limit=20&".$this->query_params;
        $this->query_params="";
        return json_decode($this->api_client->get($this->endpoint.$getParams,$this->query_params),true);
    }
 }